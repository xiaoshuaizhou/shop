<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'productid' => 'required|numeric',
            'productnum' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'productid.required' => '商品id不能为空',
            'productid.numeric' => '商品id必须是整数',
            'productnum.required' => '商品数量不能为空',
            'productnum.numeric' => '商品数量必须是整数',
        ];
    }
}
