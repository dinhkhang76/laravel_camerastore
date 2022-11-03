<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
            'name'=> 
                 [ 'required',
                 Rule::unique('products','name')->ignore($this->product),
                 ],
            'metakey'=>'required',
            'metadesc'=>'required',
            'detail'=>'required',
            'catid'=>'required',
            'suppid'=>'required',
            'img'=>'mimes:png,jpg,gif|max:2048',
        ];;
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên danh mục không được để trống',
            'name.unique'=>'Tên danh mục đã tồn tại',
            'name.max'=>'Tên danh mục tối đa 255 ký tự',
            'metakey.required' => 'Từ khóa không được để trống',
            'metadesc.required' => 'Mô tả không được để trống',
            'detail.required' => 'Chi tiết không được để trống',
            'catid.required' => 'Chưa chọn danh mục sản phẩm',
            'suppid.required' => 'Chưa chọn nhà cung cấp',
            'img.mimes' => 'Không đúng định dạng',
            'img.max' => 'Hình ảnh tối đa 2048 ',
        ];
    }
}
