<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Office;

use App\Http\Requests\StoreUserRequest;


class AdminController extends Controller
{
   public function __construct()
   {
     view()->share('offices', Office::all());
   }

  public function getLogin(){
    if(Auth::check()){
      return redirect()->route('dashboard');
    }else{
      return view('login');
    }
  }

  public function postLogin(Request $request){
    $data = [
      'name' => $request->name,
      'password' => $request->password,
    ];
    $remember = false;
    if($request->remember == 'on'){
      $remember = true;
    }

    if(Auth::attempt($data, $remember)){
      return redirect()->route('dashboard');
    }else{
      return back()->withInput()->with('message', __('Tài khoản hoặc mật khẩu chưa đúng. Xin thử lại!'));
    }
  }
  public function logout(){
    Auth::logout();
    return redirect()->route('getLogin');
  }

  public function getRegister(){
    return view('register');
  }

  public function postRegister(StoreUserRequest $request){
    try {
      // DB::beginTransaction();
      $item = new User();
      if ($request->hasFile('avatar')) {
        $item->avatar   = uploadImage($request->avatar, UserController::FOLDER_IMAGE);
      }
      $item->name         = $request->name;
      $item->email        = $request->email;
      $item->password     = bcrypt($request->password);
      $item->fullname     = $request->fullname;
      $item->phone        = $request->phone;
      $item->address      = $request->address;
      $item->active       = 0;
      $item->office_id    = 1;
      $item->position_id  = 4;

      $item->save();
      // DB::commit();
      return back()->with('message', __('Thêm thành viên thành công!'));
    } catch (ModelNotFoundException $exception) {
      // DB::rollBack();
      return back()->with('error', __('Thêm thành viên không thành công!'));
    }
  } 
}
