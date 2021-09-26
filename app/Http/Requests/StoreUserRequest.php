<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|min:5|max:50|unique:users,name,'. $this->id,
            'email' => 'bail|required|email|unique:users,email,'. $this->id,
            'password' => 'bail|required|min:8',
            'fullname' => 'bail|required',
            'phone' => 'bail|required|numeric|digits:10',
            'address' => 'bail|required',
            'office_id' => 'required',
            'position_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên!',
            'name.min' => 'Vui lòng nhập ít nhất 5 kí tự!',
            'name.max' => 'Vui lòng nhập ít hơn 50 kí tự!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Vui lòng nhập đúng định dạng email!',
            'email.unique' => 'Email đã tồn tại!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'password.min' => 'Mật khẩu ít nhất 8 kí tự',
            'fullname.required' => 'Vui lòng nhập họ và tên!',
            'phone.required' => 'Vui lòng nhập số điện thoại!',
            'phone.numeric' => 'Số điện thoại phải là chữ số!',
            'phone.digits' => 'Số điện thoại phải bắt đầu là 0 và có 10 chữ số!',
            'address.required' => 'Vui lòng nhập địa chỉ!',
            'position_id.required' => 'Vui lòng chọn vị trí công việc!',
            'office_id.required' => 'Vui lòng chọn văn phòng làm việc!',
            'position_id.required' => 'Vui lòng chọn vị trí công việc!'
        ];
    }
}
