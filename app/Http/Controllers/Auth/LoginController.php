<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Attempt;
use App\Category;

class LoginController extends Controller
{
 function index()
 {    
   return view("auth.login");
 }
 function login(Request $request)
 {
   $username = $request->username;
   $password = $request->password;
   $request->validate([       
    'username'=> 'required',
    'password'=>'required',
  ]);
   if(Auth::attempt(["username"=> $username,"password"=>$password])){
    $user=Auth::user();
    if($user->role ==0){
      return redirect()->route("home");
    }else{
      
      return redirect()->route("admin.dashboard");
    }

  }
  else{
   return redirect()->route("auth.login", ["error" => "Invalid username or password"]);
 }
}
}

