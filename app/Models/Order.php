<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public $table = 'orders';
    public function ordersusers()
    {
    	return $this -> belongsTo('App\Models\Users','uid');
    }
    public function ordersgoods()
    {
    	return $this -> belongsTo('App\Models\Goods','gid');
    }
    public function ordersuserdetalis()
    {
        return $this -> belongsTo('App\Models\UserDetalis','uid');
    }
}
