<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

    // 指定Users表主键
    protected $primaryKey = 'uid';
    // 一对一关系
    public function UserDetails()
    {
        return $this->hasOne('App\Models\UserDetails','uid');
    }
    //  /**
    //  * 指定是否模型应该被戳记时间。
    //  *
    //  * @var bool
    //  */
    // public $timestamps = false;

    //

}
