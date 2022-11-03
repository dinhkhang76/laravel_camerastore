<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required',
            'fullname' => 'required',
            'password' => 'required|min:3', 
            'phone' =>   'required|min:8||max:11',  
            'gender' => 'required',           
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên đăng nhập không được để trống',
            'name.min' => 'Tên đăng nhập phải lớn hơn 3 ký tự',
            'fullname.required' =>'Nhập họ tên',
            'password.required' =>'Nhập password',  
            'password.min'=>'mật khẩu phải lớn hơn hoặc bằng 3',
            'phone.required' =>'Nhập số điện thoại', 
            'phone.max'=>'số điện thoại phải 10 số ',
            'phone.min'=>'số điện thoại phải 10 số',
            'gender.required' =>'Nhập giới tính',
        ];
    }
}
