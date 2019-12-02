<?php

namespace App\Http\Requests;

class InterfaceHostRequest extends FormRequest
{
    /**
     * 验证规则
     * @return array
     */
    public function rules()
    {
        switch ($this->method())
        {
            case 'POST':
                return [
                    'name' => 'required|string',
                    'address' => ['required', 'regex:/^(http:\/\/|https:\/\/).*$/'],
                ];
            case 'PUT':
                return [
                    'name' => 'string',
                    'address' => ['regex:/^(http:\/\/|https:\/\/).*$/'],
                ];
        }
    }

    /**
     * 属性名称
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '主机名',
            'address' => '主机地址',
        ];
    }

    /**
     * 验证提示
     * @return array
     */
    public function messages()
    {
        return array_merge(parent::messages(), [
            'address.regex' => '主机地址 应以 http:// 或 https:// 开头'
        ]);
    }
}