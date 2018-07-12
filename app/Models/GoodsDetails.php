<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class GoodsDetails extends Model
{
	// 指定表 商品详情表
    public $table = 'goods_details';

    // 商品详情表属于商品表   gid  商品表外键
    public function goods_details()
	{
		  return $this->belongsTo('App\Models\Goods','gid');
	}

	
}
