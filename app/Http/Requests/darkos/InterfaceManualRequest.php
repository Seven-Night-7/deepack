<?php

namespace App\Http\Requests\darkos;

use App\Enums\FieldType;
use App\Enums\MethodType;
use App\Http\Requests\FormRequest;
use Illuminate\Validation\Rule;

class InterfaceManualRequest extends FormRequest
{
    /**
     * 验证规则
     * @return array
     */
    public function rules()
    {
        switch ($this->method())
        {
            case 'GET':
                return [
                    'dir_id' => 'required|integer|exists:manual_dirs,id',
                ];

            case 'POST':
            case 'PUT':
                $rule = [
                    'name' => 'required',
                    'uri' => 'required',
                    'method_type' => ['required',Rule::in(MethodType::getValues())],
                    'desc' => 'string',

                    'request_params' => 'array',
                    'request_params.*.name' => 'string',
                    'request_params.*.field_type' => Rule::in(FieldType::getValues()),
                    'request_params.*.desc' => 'string',
                    'request_params.*.is_required' => 'in:0,1',

                    'response_params' => 'array',
                    'response_params.*.name' => 'string',
                    'response_params.*.field_type' => Rule::in(FieldType::getValues()),
                    'response_params.*.desc' => 'string',
                ];

                if ($this->method() == 'POST') {
                    $rule['dir_id'] = 'required|integer|exists:manual_dirs,id';
                }

                return $rule;
        }
    }

    /**
     * 属性名称
     * @return array
     */
    public function attributes()
    {
        return [
            'dir_id' => '目录',
            'name' => '接口名称',
            'uri' => '资源标志符',
            'method_type' => '请求方式',
            'desc' => '简要描述',

            'request_params.*.name' => '参数名',
            'request_params.*.field_type' => '数据类型',
            'request_params.*.desc' => '简要描述',
            'request_params.*.is_required' => '是否必选',

            'response_params.*.name' => '参数名',
            'response_params.*.field_type' => '数据类型',
            'response_params.*.desc' => '简要描述',
        ];
    }
}
