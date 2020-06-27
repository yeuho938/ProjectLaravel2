<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
Use App\Category;

class ClothesController extends Controller
{   
	function create(){
		$categories = Category::all();
		return view('admin.clothes.create',['categories'=>$categories]);
	}
	function header(){
		$categories = Category::all();
		return view('partials.header',['categories'=>$categories]);
	}
	
	function index(){
		$categories = Category::all();
		$product = Product::all();
		return view("admin/clothes/index", [ "clothesdata" => $product,"categories"=>$categories]);
	}
	function store(Request $request){
		$name = $request->name;
		$quantity =$request->quantity;
		$cate = $request->category;
		$price =$request->price;
		$priceOld =$request->priceOld;
		$description = $request->description;
		$file = $request->file("image")->store("public");

		// $request->validate([   	
		// 	'name'=> 'required|max:255',
		// 	'price'=>'required',
		// 	'category_id'=>'required',
		// 	'description'=>'required',
		// 	'image'=>'required',
		// 	'quantity'=>'required',
		// ]);
		$product = new Product();
		$product->name=$name;
		$product->image=$file;
		$product->category_id =$cate;
		$product->price =$price;
		$product->oldPrice = $priceOld;
		$product->description=$description;
		$product->quantity=$quantity;

		$product->save();
		return redirect('/admin/clothes');
	}
	public function destroy($id)
	{   
		$product = Product::find($id);
		$product->delete();
		return redirect('/admin/clothes');

	}
	function edit($id){
		$product = Product::find($id);
		$categories = Category::all();
		return view("/admin/clothes/edit",["array" => $product,"categories"=>$categories]);
	}
	function update($id, Request $request){
		$name = $request->name;
		$quantity =$request->quantity;
		$price =$request->price;
		$cate = $request->category;
		$priceOld =$request->priceOld;
		$description = $request->description;
		$file = $request->file("image")->store("public");

		// $request->validate([   	
		// 	'name'=> 'required|max:255',
		// 	'price'=>'required',
		// 	'category_id'=>'required',
		// 	'description'=>'required',
		// 	'image'=>'required',
		// 	'quantity'=>'required',
		// ]);

		$product = Product::find($id);
		$product->id = $id;
		$product->name = $name;
		$product->category_id =$cate;
		$product->image=$file;
		$product->quantity=$quantity;
		$product->price = $price;
		$product->oldPrice = $priceOld;
		$product->description =$description;

		$product->save();

		return redirect('/admin/clothes');

	}
	
	
}
