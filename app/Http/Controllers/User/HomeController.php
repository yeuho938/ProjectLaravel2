<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\Cart;
use App\Order;
class HomeController extends Controller
{

  function logout()
  {
   Auth::logout();
   return redirect()->route('home');
 }

function infoUser(Request $request){
  $id_user = Auth::user()->id;
  $info = Order::where('user_id',$id_user)->get();
  return view('user.infoUser',['information'=>$info]);
}

function productCate($id){
  $cate = Category::all();
  $procate = DB::table('products')->where('category_id','=',$id)->get();
  return view('user.category.displayProductCate',["productcategory" => $procate,"categories"=>$cate]);
}

function AscPrice(Request $request){
 $cate = Category::all();
 $page = $request->page;
 $product = Product::orderBy('price', 'asc')->get();
 return view("user/home",['clothesdata'=>$product,"categories"=>$cate,"page" => $page]);
}

function DescPrice(Request $request){
 $cate = Category::all();
 $page = $request->page;
 $product = Product::orderBy('price', 'desc')->get();
 return view("user/home",['clothesdata'=>$product,"categories"=>$cate,"page" => $page]);
}

function index(Request $request)
{ 
  $category= Category::all();
  $request->session()->put('category',$category);
  $quanly = "QUẢN LÝ";
  $request->session()->put('quanly',$quanly);
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
  if(Auth::user())
  {
    $id_user = Auth::user()->id;
    $carts = Cart::where('user_id','=',$id_user)->get();
    $quantity = 0;
    foreach($carts as $cart)
    {
      $quantity += $cart->quantity;
    }      
    $request->session()->put('totalQuantity',$quantity);
  }
  else
  {    
    $quantity = 0;
  }

  return view("user/home", [ "clothesdata" => $product,"page" => $page,"quanly"=>$quanly]);
}

function search(Request $request)
{  
 $txt = $request->input('txtSearch');
 $search = Product::where('name','LIKE','%'.$txt.'%')->get();
 return view('user.search',['research'=>$search,'seach'=>$txt]);
}

function detail($id)
{ 
  $datadetail = Product::find($id);
  return view("/user/detail",["datadetail" => $datadetail]);
}
}
