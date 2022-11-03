<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title'=>'required|unique:posts',
            'metakey'=>'required',
            'metadesc'=>'required',
            'detail'=>'required',
            'topid'=>'required',
            'img'=>'mimes:png,jpg,gif|max:2048',

        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Tiêu đề bài viết không được để trống',
            'title.unique'=>'Tiêu đề bài viết đã tồn tại',
            'name.max'=>'Tên danh mục tối đa 255 ký tự',
            'metakey.required' => 'Từ khóa không được để trống',
            'metadesc.required' => 'Mô tả không được để trống',
            'detail.required' => 'Chi tiết không được để trống',
            'topid.required' => 'Chưa chọn chủ đề bài viết',
            'img.mimes' => 'Không đúng định dạng',
            'img.max' => 'Hình ảnh tối đa 2048 ',

        ];
    }
}
