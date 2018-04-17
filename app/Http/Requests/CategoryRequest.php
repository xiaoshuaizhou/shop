<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'parent_id' => 'required',
            'title' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'parent_id.required' => '上级分类不能为空',
            'title.required' => '分类名称不能为空',
            'title.max' => '分类名称最大255个字符'
        ];
    }
}
