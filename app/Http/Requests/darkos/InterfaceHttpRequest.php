<?php

namespace App\Http\Requests\darkos;

use App\Enums\FieldType;
use App\Enums\MethodType;
use App\Http\Requests\FormRequest;
use Illuminate\Validation\Rule;

class InterfaceHttpRequest extends FormRequest
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
                    'host_address' => ['required', 'regex:/^(http:\/\/|https:\/\/).*$/'],
                    'uri' => 'required',
                    'method_type' => ['required', Rule::in(MethodType::getValues())],

                    'request_params' => 'array',
                    'request_params.*.name' => 'string',
                    'request_params.*.value' => 'string',
                    'request_params.*.field_type' => Rule::in(FieldType::getValues()),
                ];
        }
    }

    /**
     * 属性名称
     * @return array
     */
    public function attributes()
    {
        return [];
    }
}