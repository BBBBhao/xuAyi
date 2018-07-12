<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GoodsRequest extends Request
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
            'gname' => 'required',
            'cid' => 'required',
            'describe' => 'required',
            'price' => 'required',
            // 'discount' => 'required',
            'description' => 'required',
            'type' => 'required',
            'color' => 'required',
            'pic' => 'required',
            'images' => 'required',
        ];
    }

    // 自定义错误信息
    public function messages()
    {
        return [
            'gname.required' => '商品名称必填',
            'cid.required' => '所属分类必选',
            'describe.required' => '商品描述',
            'price.required' => '商品价格必填',
            // 'discount.required' => '商品折扣价必填',
            'discount.required' => '商品折扣价必填',
            'type.required' => '商品详情参数必填',
            'color.required' => '商品颜色必填',
            'pic.required' => '商品展示列表图片必填',
            'images.required' => '商品详情图片必填',
        ];
    }
}
