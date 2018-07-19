<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresss extends Model
{
	// 指定Users表主键
    protected $primaryKey = 'id';
    // 指定表
    public $table = 'addresss';
}
