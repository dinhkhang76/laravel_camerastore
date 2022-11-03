<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTopicRequest extends FormRequest
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
                 Rule::unique('topics','name')->ignore($this->topic),
                 ],
            'metakey'=>'required',
            'metadesc'=>'required',
        ];;
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên bài viết không được để trống',
            'name.unique'=>'Tên bài viết đã tồn tại',
            'name.min'=>'Tên bài viết',
            'metakey.required'=>'Từ khóa không được để trống',
            'metadesc.required'=>'Mô tả không được để trống',
        ];
    }
}
