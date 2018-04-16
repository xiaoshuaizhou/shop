<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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

    /**
     * "_token" => "IF2r9elfQIibeYLYpDl8SO82h99nOGKuQU2osOx8"
    "name" => "yingyongbao"
    "truename" => "fasdf"
    "nicjname" => "afdsfas"
    "status" => "1"
    "borthday" => "2018-01-01"
    "company" => "fadsfadsf"
    "email" => "fasdfasdf@qq.cp"
    "phone" => "fasdffadsfafd"
    "website" => "afdsafadsf"
    "detailaddress" => "adsfadsfadfs"
    "province" => "adsfadsfadfs"
    "city" => "adsfafsd"
    "postcode" => "adsfafds"
    "mark" => "asdfadsfasdfadfs"
    ]
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'truename' => 'required|max:255',
            'nickname' => 'required|max:255',
            'sex' => 'required',
            'status' => 'required|in:0,1',
            'email' => 'required|email|max:255',
            'company' => 'required|max:255',
            'phone' => [
                'required',
                'regex:/^1([358][0-9]|4[579]|66|7[0135678]|9[89])[0-9]{8}$/'
            ],
            'website' => 'required|max:255',
            'detailaddress' => 'required|max:255',
            'province' => 'required|max:255',
            'city' => 'required|max:255',
            'postcode' => 'required',
            'mark' => 'max:100'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.max' => '用户名最多255个字符',
            'truename.required' => '真实名称不能为空',
            'truename.max' => '真实名称最所255个字符',
            'nickname.required' => '昵称不能为空',
            'nickname.max' => '昵称最多255个字符',
            'sex.required' => '性别不能为空',
            'status.required' => '状态不能为空',
            'status.in' => '状态只能是0或者1',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式不正确',
            'company.required' => '公司名称不能为空',
            'company.max' => '公司名称最大255个字符',
            'phone.required' => '手机号不能为空',
            'phone.regex' => '请填写正确的手机号',
            'website.required' => '网址不能为空',
            'website.max' => '网址最大255个字符',
            'detailaddress.required' => '详细地址不能为空',
            'detailaddress.max' => '详细地址最大255个字符',
            'province.required' => '省份不能为空',
            'province.max' => '省份最多255个字符',
            'city.required' => '城市不能为空',
            'city.max' => '城市最多255个字符',
            'postcode.required' => '邮政编码不能为空',
            'mark.max' => '备注最多100字符'
        ];
    }
}
