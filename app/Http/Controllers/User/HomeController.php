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

 function productCate($id){
  $cate = Category::all();
  $procate = DB::table('products')->where('category_id','=',$id)->get();
  return view('user.category.displayProductCate',["productcategory" => $procate,"categories"=>$cate]);
}
function index(Request $request)
{
  $category= Category::all();
  $page = $request->page;
  $product = Product::all()->skip($page * 5)->take(8);
  if($product->isEmpty())
  { 
    $photos = Product::all()->take(8);
    return redirect('/home/user/?page=0');
  }
  else if($page < 0)
  {
    $totalPage = round(count(Product::all())/5)-1;
    return redirect('/home/user/?page='.$totalPage);
  }
  return view("user/home", [ "clothesdata" => $product,"categories"=>$category,"page" => $page]);
}

function search(Request $request)
{  
 $category= Category::all();
 $txt = $request->input('txtSearch');
 $search = DB::table('products')
 ->where('name','LIKE','%'.$txt.'%')->get();
 return view('user.search',['research'=>$search,'categories'=>$category]);
}

function detail($id)
{
  $datadetail = Product::find($id);
  return view("/user/detail",["datadetail" => $datadetail ]);
}



}
