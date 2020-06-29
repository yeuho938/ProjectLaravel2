<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    function products(){
		return $this->hasMany('App\Product','id','product_id');
	}
}
