<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	function products(){
		return $this->hasMany('App\Product','id','product_id');
	}
	function users(){
		return $this->hasOne('App\User','id','user_id');
	}
	// function formatedPrice($number){
	// 	return number_format($number)." đ";
	// }
	// function formatedPrice($number){
	// 	return $this->quantity*$number;
	// }
}
