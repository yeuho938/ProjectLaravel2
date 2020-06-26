<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Category;
class RegisterController extends Controller
{
    function index(){
         $cate = Category::all();
    	return  view("auth.register",['categories'=>$cate]);
    }
    function header1(){
        $categories = Category::all();
        return view('partials.head1',['categories'=>$categories]);
    }
    function register(Request $request){
    	$name = $request->fullname;
    	$username = $request->username;
    	$password = $request->password;
    	$email = $request->email;
        $address = $request->address;
        $phone = $request->phone;
        $request->validate([ 
            'fullname'=>'required',      
            'username'=> 'required|unique:users|max:255',
            'email'=>'required|unique:users',
            'phone'=>'required|max:9',
            'password'=>'required',
            'address'=>'required',
        ]);
    	$role = 0;
    	$hashpassword = Hash::make($password);

    	DB::table('users')->insert(
			["fullname"=>$name,"username" => $username, "password" => $hashpassword, "email" => $email,"address"=>$address,"phone"=>$phone,"role"=>$role]);   	
    
    return redirect("/auth/login");
}
}