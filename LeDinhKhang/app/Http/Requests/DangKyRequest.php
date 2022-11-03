<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//đổi về true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    
    public function rules()
    {
        return [
            'name' => 'required|unique:users',
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|max:30', 
            'phone' =>   'required|min:8||max:11',
            'address' => 'required',   
            'gender' => 'required',           
        ];
    }
    public function messages()
    {
        return [
            'name.unique' => 'Tên đăng nhập đã tồn tại',
            'name.required' =>'Tên đăng nhập không được để trống',
            'fullname.required' =>'Nhập họ tên',
            'email.required' =>'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'password.required' =>'Mật khẩu không được để trống',  
            'password.min'=>'Mật khẩu ít nhất 3 ký tự',
            'password.max'=>'Mật khẩu không quá 30 ký tự ',
            'phone.required' =>'Số điện thoại không được để trống', 
            'phone.max'=>'Số điện thoại tối đa 11 số ',
            'phone.min'=>'Số điện thoại ít nhất 8 số',
            'address.required' =>'Nhập địa chỉ', 
            'gender.required' =>'Chọn giới tính',
        ];
    }
}