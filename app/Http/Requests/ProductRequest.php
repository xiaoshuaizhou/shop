<?php

namespace App\Http\Requests;

use App\Rules\ProductRules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'cateid' => 'required|numeric',
            'title' => 'required|max:255',
            'descr' => 'required|max:255',
            'price' => 'required',
            'ishot' => [
                'required',
                Rule::in(['0', '1']),
            ],
            'saleprice' => 'required',
            'num' => 'required',
            'istui' => [
                'required',
                Rule::in(['0', '1']),
            ],
            'ison' => [
                'required',
                Rule::in(['0', '1']),
            ],
            'cover' => 'required',
            'pics' => ['required', new ProductRules()]
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'cateid.required' => '分类不能为空',
            'cateid.numberic' => '分类ID必须是整数',
            'title.rquired' => '商品名称不能为空',
            'title.max' => '商品名称最大255个字符',
            'descr.required' => '商品描述不能为空',
            'descr.max' => '商品描述最大255个字符',
            'price.rquired' => '商品价格不能为空',
            'ishot.required' => '是否热卖不能为空',
            'ishot.in' => '是否热卖参数错误',
            'saleprice.required' => '促销价格不能为空',
            'num.required' => '库存不能为空',
            'istui.required' => '是否推销不能为空',
            'istui.in' => '是否推销参数错误',
            'ison.required' => '是否上架不能为空',
            'cover.required' => '商品封面不能为空',
            'pics.required' => '商品图片不能为空'
        ];
    }
}
