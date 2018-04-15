<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagerRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
            ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.max' => '用户名最大255个字符',
            'email.required' => '邮箱不能为空',
            'email.email' => '请填写正确的邮箱',
            'email.max' => '邮箱最长255个字符',
            'email.unique' => '该邮箱已经被占用',
            'password.required' => '密码不能为空',
            'password.min' => '密码最少6个字符',
            'password.confirmed' => '两次密码输入不一致'
        ];
    }
}
