<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CatesInsertRequest extends Request
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
            'cname' => 'required',
            'pid' => 'required',
        ];
    }

    // 自定义错误信息
    public function messages()
    {
        return [
            'cname.required' => '分类名称必填',
            'pid.required' => '父级必选',
        ];
    }
}
