<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Discount;
use App\Category;
class DiscountController extends Controller
{
    function index(){
		$category = Category::all();
		$discount = Discount::all();
		return view('admin.discounts.index',['categories'=>$category,'discounts'=>$discount]);
	}
	function create(){
		$category = Category::all();
		return view('admin.discounts.create',['categories'=>$category]);
	}
	function store(Request $request){
		$name = $request->name ;
        $percent = $request->percent ;
        
		$request->validate([   	
			'name'=> 'required',
			'percent'=> 'required',
		]);
		$discount = new Discount();
		$discount->name =$name;
		$discount->percent =$percent;
		$discount->save();

		 return redirect('/discount/index');
	}
	function destroy($id){
		$dis = Discount::find($id);
		$dis->delete();
		return redirect('/discount/index');
	}
}
