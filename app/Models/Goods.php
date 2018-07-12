<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Goods extends Model
{
    // 软删除
    use SoftDeletes; 

    // 商品表 与 商品详情表 一对一关系  gid -> 商品表外键
    public function GoodsDetails()
    {
    	return $this->hasOne('App\Models\GoodsDetails','gid');
    }

    // 商品表 与 商品图片 一对多关系  gid -> 商品表外键
    public function GoodsImages()
    {
    	return $this->hasMany('App\Models\GoodsImages','gid');
    }

    // 商品表与 商品分类表属于关系  cid -> 分类表外键
    public function cates_goods()
    {
          return $this->belongsTo('App\Models\Cates','cid');
    }
}
