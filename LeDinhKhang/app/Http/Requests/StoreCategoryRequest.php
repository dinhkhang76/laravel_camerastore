<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name'=>'required|unique:categorys|min:2',
            'name'=>'required|unique:categorys|max:255',
            'metakey'=>'required',
            'metadesc'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên danh mục không được để trống',
            'name.unique'=>'Tên danh mục đã tồn tại',
            'name.min'=>'Tên danh mục ít nhất 2 ký tự',
            'name.max'=>'Tên danh mục tối đa 255 ký tự',
            'metakey.required' => 'Từ khóa không được để trống',
            'metadesc.required' => 'Mô tả không được để trống',
        ];
    }
}
