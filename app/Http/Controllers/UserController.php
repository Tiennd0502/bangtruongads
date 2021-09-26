<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User as MainModel;
use App\Models\Office;
use App\Models\Position;
use App\Http\Requests\StoreUserRequest;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
  public $current_page = 'user';
  const FOLDER_IMAGE = 'images/users';

  public function __construct()
  {
    view()->share('current_page', $this->current_page);
    view()->share('offices', Office::all());
    view()->share('positions', Position::all());
  }

  public function index()
  {
   if (view()->exists($this->current_page . '.index')) {
      return view($this->current_page . '.index');
   }
   return abort('404');
    
  }

  public function getConfirm(Request $request)
  {
    if($request->ajax()){
      $users = MainModel::where('active',0)->select(['id', 'fullname', 'email', 'phone', 'network_operator']);
      return Datatables::of($users)
      ->addColumn('action', function ($user) {
        return '<a href="javascript:void(0)" data-url="'. route('user.active', $user->id) .'" class="btn btn-xs btn-success js-user-active"><i class="fas fa-user-check"></i> Chấp nhận</a><meta name="csrf-token" content="{{ csrf_token() }}"><a href="javascript:void(0)" data-id="' . $user->id . '" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-times"></i> Hủy bỏ</a>';
      })
      ->rawColumns(["action"])
      ->make(true);
    }
  }

  public function getMember(Request $request)
  {
    if($request->ajax()){
      $users = MainModel::where("active",1)->select(["id", "fullname", "email", "phone", "network_operator"]);
      return Datatables::of($users)
      ->addColumn("action", function ($user) {
        return '<a href="'. route('user.show', $user->id) .'" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i> Sửa</a> <meta name="csrf-token" content="{{ csrf_token() }}"><a href="javascript:void(0)" data-url="' . $user->id . '" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-times"></i> Hủy bỏ</a>';
      })
      ->rawColumns(['action'])
      ->make(true);
    }
  }

  public function active(Request $request, $id)
  {
    try {
      // DB::beginTransaction();
      $item = MainModel::find($id);
      $item->active    = 1;
      $item->save();
      // DB::commit();
      return true;
    } catch (ModelNotFoundException $exception) {
      // DB::rollBack();
      return false;
    }
  }

  public function create()
  {
    return view($this->current_page . '.create');
  }

  public function store(StoreUserRequest $request)
  {
    try {
      // DB::beginTransaction();
      $item = new MainModel();
      if ($request->hasFile('avatar')) {
        $item->avatar   = uploadImage($request->avatar, UserController::FOLDER_IMAGE);
      }
      $item->name         = $request->name;
      $item->email        = $request->email;
      $item->password     = bcrypt($request->password);
      $item->fullname     = $request->fullname;
      $item->phone        = $request->phone;
      $item->address      = $request->address;
      $item->active       = $request->active;
      $item->office_id    = $request->office_id;
      $item->position_id  = $request->position_id;

      $item->save();
      // DB::commit();
      return back()->with('message', __('Thêm thành viên thành công!'));
    } catch (ModelNotFoundException $exception) {
      // DB::rollBack();
      return back()->with('error', __('Thêm thành viên không thành công!'));
    }

    return 'view-add-csdl';
  }

  public function edit()
  {
    return 'view-edit';
  }

  public function update()
  {
    return 'view-update-csdl';
  }

  public function show()
  {
    return 'view-show';
  }

  public function destroy()
  {
    return 'view-delete';
  }
}
