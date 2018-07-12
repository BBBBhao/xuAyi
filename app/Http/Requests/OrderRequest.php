<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrderRequest extends Request
{
    /**
     * 是否开启自动验证
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * 验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
          
        ];
    }

   
}
