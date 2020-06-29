<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Cart;
use App\Category;
use App\User;
use App\Discount;

class OrderController extends Controller
{
	function index(Request $request){
		$category = Category::all();
		$id_user = Auth::user()->id;

		$carts = Cart::where('user_id',$id_user)->get();
		$discount = Discount::where('name',$name)->get();
		$total1 = 0;
		$total =0;
		foreach ($carts as $cart){
			foreach ($cart->products as $product) {
				$total1 = $total1+($cart->quantity * $product->price);
			}
		}
        $total = $total + ($total1*($discount->percent))/100;

		$name= $request ->name;
		$phone= $request ->phone;
		$email= $request ->email;
		$address= $request ->address;
		$note= $request ->note;

		$info = new Order();
		$info->name=$name;
		$info->phone=$phone;
		$info->email =$email;
		$info->address =$address;
		$info->note = $note;
		$info->code=$discount->name;
		$info->percent=$discount->percent;
		$info->total=$total;
		$info->percent=$discount->percent;
		$info->percent=$discount->percent;
		$info->save();
		
		return view('admin.orders.order');
	}
}
