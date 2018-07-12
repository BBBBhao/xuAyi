<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LinkRequest extends Request
{
    /**
     * 是否开启自动验证
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'url' => 'required',
        ];
    }

    // 自定义错误信息
    public function messages()
    {
        return [
            'name.required' => '链接名称必填',
            'url.required' => '链接地址必填',
        ];
    }
}
