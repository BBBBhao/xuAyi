<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
	// 指定UserDetails表主键
    protected $primaryKey = 'uid';
    public $table = 'userdetails';
}
