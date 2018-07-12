<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LunboRequest extends Request
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
            'banner_url' => 'required',
            'picture' => 'required'
        ];
    }

    // 自定义错误信息
    public function messages()
    {
        return [
            'name.required' => '名称必填',
            'banner_url.required' => '地址必写',
            'picture.required' => '图片必选'
        ];
    }
}
