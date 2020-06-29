<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Cart;
use App\Category;
use App\User;
use App\Discount;

class PaymentController extends Controller
{
	function index(Request $request){
		$category = Category::all();
		$id_user = Auth::user()->id;
		$name = $request->name;
		$discount = Discount::where('name',$name)->get();
		$carts = Cart::where('user_id',$id_user)->get();
		
		return view('user.payment',['carts'=>$carts,'discounts'=>$discount]);
	}
	function edit(){
		return view('user.cart');
	}
	
}
