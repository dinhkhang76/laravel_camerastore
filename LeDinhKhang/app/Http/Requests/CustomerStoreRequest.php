<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            'name' => [
                'min:3',
                'required',
                Rule::unique('users', 'name')->ignore($this->user)
            ],
            'email' => [
                'email:rfc,dns',
                'required',
                Rule::unique('users', 'email')->ignore($this->user)
            ],
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3', 
            'phone' =>   'required|min:8||max:11',  
            'gender' => 'required',           
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên đăng nhập không được để trống',
            'name.unique' => 'Tên đăng nhập đã tồn tại',
            'name.min' => 'Tên đăng nhập ít nhất 3 ký tự',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email này đã tồn tại',
            'fullname.required' =>'Họ tên không được trống',
            'password.required' =>'Mật khẩu không được trống',  
            'password.min'=>'Mật khẩu ít nhất 3 ký tự',
            'phone.required' =>'Nhập số điện thoại', 
            'phone.max'=>'số điện thoại phải 10 số ',
            'phone.min'=>'số điện thoại phải 10 số',
            'gender.required' =>'Chọn giới tính',
        ];
    }
}
