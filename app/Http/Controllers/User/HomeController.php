<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;

class HomeController extends Controller
{

  function logout()
  {
   Auth::logout();
   return redirect()->route('home');
 }

 function aokhoac(){
   $aokhoac = Product::all();
   return view('user.category.aokhoac',[ "aokhoacs" => $aokhoac]);
 }
 function index(Request $request)
 {
  $category= Category::all();
  $page = $request->page;
  $product = Product::all()->skip($page * 5)->take(12);
  if($product->isEmpty())
  { 
    $photos = Product::all()->take(12);
    return redirect('home/?page=0');
  }
  else if($page < 0)
  {
    $totalPage = round(count(Product::all())/5)-1;
    return redirect('home/?page='.$totalPage);
  }
  return view("user/home", [ "clothesdata" => $product,"categories"=>$category,"page" => $page]);
}

function search(Request $request)
{  
 $category= Category::all();
 $txt = $request->input('txtSearch');
 $search = DB::table('products')->where('name','LIKE','%'.$txt.'%')->get();
 return view('user.search',['research'=>$search,'categories'=>$category]);
}

function detail($id)
{
  $datadetail = Product::find($id);
  return view("/user/detail",["datadetail" => $datadetail ]);
}



}
