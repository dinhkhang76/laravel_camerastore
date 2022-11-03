<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSupplierRequest extends FormRequest
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
            
            'name'=>'required',
            'url'=>'required',
            'img'=>'mimes:png,jpg,gif|max:2048',
        ];;
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên slider không được để trống',
            'url.required' => 'Liên kết không được để trống',
            'img.mimes' => 'Hình ảnh không được để trống',
        ];
    }
}
