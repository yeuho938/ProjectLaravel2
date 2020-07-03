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
    	return  view("auth.register");
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
            'username'=> 'required|unique:users|max:50',
            'email'=>'required|unique:users|min:15',
            'phone'=>'required|max:10|min:10',
            'password'=>'required|min:6',
            'address'=>'required',
        ]);
        $role = 0;
        $hashpassword = Hash::make($password);

        DB::table('users')->insert(
         ["fullname"=>$name,"username" => $username, "password" => $hashpassword, "email" => $email,"address"=>$address,"phone"=>$phone,"role"=>$role]);   	

        return redirect("/auth/login");
    }
}