<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     public function category(){
    	return $this->belongsTo("App\Category","category_id","id");
    }
    function getDisplayPrice(){
    	$formatedPrice = number_format($this->price,0,',','.');
    	 return $formatedPrice."VND";
    }
     function getDisplayPriceOld(){
    	$formatedPrice = number_format($this->oldPrice,0,',','.');
    	 return $formatedPrice."VND";
    }
}
