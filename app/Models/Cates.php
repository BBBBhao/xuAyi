<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{

    // 商品分类表 与 商品表 一对多关系  cid -> 分类表外键
    public function goods()
    {
    	return $this->hasMany('App\Models\Goods','cid');
    }

    

}
