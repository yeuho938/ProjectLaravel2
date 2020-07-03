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
use App\Order;
class OrderController extends Controller
{   
	function index(Request $request){
		$order = Order::all();	
		return view('admin.orders.order',['orders'=>$order]);
	}
	function store(Request $request){
		$id_user = Auth::user()->id;
		
		$name = $request->fullname;
		$phone= $request->phone;
		$email= $request->email;
		$address= $request->address;
		$note= $request->note;

		$discount = $request->namedis;

		$percent = Discount::where('name', $discount)->value('percent');
		$namecode = Discount::where('name', $discount)->value('name');

		$total1=2;
		$total = 0;
		$phi = 20000;

		$carts = Cart::where('user_id',$id_user)->get();
		foreach ($carts as $cart) {
			$cart->products;
		}

		foreach($carts as $cart){
			foreach ($cart->products as $product) {
				$total1 = $total1 + ($cart->quantity * $product->price);
				$arrayProduct[] = array(
					'image'=>$product->image,
					'name' =>$product->name,
					'quantity' =>$cart->quantity,
					'price' =>$product->price,
				);
			}
		}
		if($percent >0){
			$total=$total +($percent * $total1)/100 + $phi;
		}else{
			$total=$total +$total1+ $phi;
		}
		$dapro = json_encode($arrayProduct);     
		$discount = Discount::all();

		
		$info = new Order();
		$info->user_id=$id_user;
		$info->name=$name;
		$info->phone=$phone;
		$info->email =$email;
		$info->address =$address;
		$info->note = $note;
		$info->status = "f";
		$info->code = $namecode;
		$info->percent =$percent;
		$info->total =  $total;
		$info->detail = $dapro;
		$info->save();
       return redirect('admin/order');
		$cart = Cart::where('user_id',$id_user)->delete();
	}
}




