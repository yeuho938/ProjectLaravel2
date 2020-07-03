<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User; 
use App\Category;
use App\Order;
class UserController extends Controller
{

	function index(){
		$users = User::all();
		return view("admin.users.index", [ "userdata" => $users]);
	}
	function store(Request $request){
		$name = $request->input("fullname");
		$username =$request->input("username");
		$password =$request->input("password");
		$email =$request->input("email");
		$address = $request->input("address");
		$phone =$request->input("phone");
		DB::table('users')->insert(
			["fullname" => $name, "username" => $username, "password" => $password,"email"=>$email,"address"=>$address,"phone"=>$phone,"role"=>$role]);
		return redirect('/admin/users');
	}
	public function destroy($id)
	{   
		$user = User::find($id);
		$user->delete();
		return redirect('admin/users');

	}
	
}
