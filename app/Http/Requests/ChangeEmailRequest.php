<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeEmailRequest extends FormRequest
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
            'name' => 'required',
            'password' => 'required',
            'email' => 'email|required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式不正确'
        ];
    }
}
