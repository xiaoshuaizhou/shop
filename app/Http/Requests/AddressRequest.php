<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AddressRequest
 * @package App\Http\Requests
 */
class AddressRequest extends FormRequest
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
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'company' => 'max:255',
            'address' => 'required|max:255',
            'postcode' => 'required|numeric',
            'email' => 'email|unique:address',
            'telephone' => [
                'required',
                'regex:/^1([3589][0-9]|4[579]|66|7[0135678]|9[89])[0-9]{8}$/'
            ],
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'firstname.required' => '姓不能为空',
            'firstname.max' => '姓最大255个字符',
            'lastname.required' => '名不能为空',
            'lastname.max' => '名最大255个字符',
            'company.max' => '公司名称最大255个字符',
            'address.required' => '详细地址不能为空',
            'address.max' => '地址最大255个字符',
            'postcode.required' => '邮编不能为空',
            'postcode.numeric' => '请填写正确的邮编',
            'email.email' => '邮箱格式不正确',
            'email.unique' => '该邮箱已被占用',
            'telephone.required' => '手机号不能为空',
            'telephone.regex' => '手机号格式不正确'

        ];
    }
}
