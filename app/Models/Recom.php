<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recom extends Model
{
    use SoftDeletes;
    //属于商品表
public function goodrecommend()
   {
    	return $this -> belongsTo('App\Models\Goods','cid');
   }
}
