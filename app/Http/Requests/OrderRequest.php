<?php

namespace App\Http\Requests;

use App\Rules\OrderDetailRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'orderdetail' => ['required','array', new OrderDetailRule()],
        ];
    }

    public function message()
    {
        return [
            'orderdetail.required' => '商品参数不能为空',
        ];
    }
}
