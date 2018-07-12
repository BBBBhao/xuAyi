<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RecomRequest extends Request
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
            //'rname' => 'required',
            'introduction' => 'required',
            
        ];
    }

    // 自定义错误信息
    public function messages()
    {
        return [
           // 'rname.required' => '名称必填',
            'introduction.required' => '导语必写',
            
        ];
    }
}
