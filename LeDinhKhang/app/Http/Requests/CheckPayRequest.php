<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckPayRequest extends FormRequest
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
            'fullname' => 'required',
            'email' => 'required',
            'phone' =>   'required|min:10||max:11',
            'address' => 'required',
            //'note' => 'required',            
        ];
    }
    public function messages()
    {
        return [
            'fullname.required' =>'Họ tên không được để trống',
            'email.required' =>'Email không được để trống',
            'phone.required' =>'Số điện thoại không được để trống', 
            'phone.max'=>'Số điện thoại tối đa 11 số ',
            'phone.min'=>'Số điện thoại tối thiểu 8 số',
            'address.required' =>'Địa chỉ không được để trống', 
            //'note.required' =>'Nhập ghi chú',
        ];
    }
}