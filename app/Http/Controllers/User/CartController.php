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
class CartController extends Controller
{
	function indexCart(){

		if(Auth::user())
		{
			$idUser = Auth::user()->id;
			$category = Category::all();
			$cartdata = DB::table('carts')
			->where('user_id','=',$idUser)
			->join('users','users.id','=','carts.user_id')
			->join('products','products.id', '=', 'carts.product_id')
			->select('carts.id','products.name', 'products.price', 'products.image','carts.quantity')
			->get();
			return view("user.cart",['cartdata' => $cartdata,"categories"=>$category]);
		}  
		else
		{
			return redirect("/auth/login");
		}
	}
	function addCart($id) {
		if(Auth::check()){
			$idUser = Auth::user()->id;
			$check = DB::table('carts')
			->where('product_id', $id)
			->where('user_id', $idUser)
			->count();

			if ($check == 1) {
				$quantity = DB::table('carts')
				->where('product_id', $id)
				->where('user_id', $idUser)
				->value('quantity') + 1;
				DB::table('carts')
				->where('product_id', $id)
				->where('user_id', $idUser)
				->update(["quantity" => $quantity]);
				return redirect()->route('home',['addcart'=>'Thêm vào giỏ hàng thành công']);
			} else {
				DB::table('carts')->insert(["product_id" => $id, "quantity" => 1, "user_id" => $idUser]);
				return redirect()->route('home',['addcart'=>'Thêm vào giỏ hàng thành công']);
				
			}
		}
		else{
			return redirect("/auth/login");
		}
	}
	function destroyCart($id){
		$cart = Cart::find($id);
		$cart->delete();
		return redirect('user/cartindex');
	}
	function increaseQuantity($id){

		$cart = Cart::find($id);
		$quantity = $cart->quantity + 1;
		$cart->quantity = $quantity;
		$cart->save();
		return redirect ('user/cartindex');
	}
	function creaseQuantity($id){

		$cart = Cart::find($id);
		$quantity = $cart->quantity - 1;
		$cart->quantity = $quantity;
		$cart->save();
		return redirect ('user/cartindex');
	}
	
}



