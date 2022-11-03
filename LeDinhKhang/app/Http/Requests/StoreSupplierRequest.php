<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
            'name' => 'required|unique:suppliers',
            'siteurl'=>'required',
            'logo'=>'mimes:png,jpg,gif|max:2048',
            'fullname'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'metadesc'=>'required',
            'metakey'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên nhà cung cấp không được để trống',
            'name.unique'=>'Tên nhà cung cấp đã tồn tại',
            'name.min'=>'Tên nhà cung cấp ít nhất 2 ký tự',
            'name.max'=>'Tên nhà cung cấp tối đa 255 ký tự',
            'metakey.required' => 'Từ khóa không được để trống',
            'metadesc.required' => 'Mô tả không được để trống',
            'siteurl.required' => 'Website không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'fullname.required' => 'Tên người đại diện không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'email.required' => 'Email không được để trống',
            'logo.required' => 'Logo không được để trống',


        ];
    }
}
