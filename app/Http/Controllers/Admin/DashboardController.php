<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Category;

class DashboardController extends Controller
{
	function index(){	
		$Category = Category::all();
		return view("admin.dashboard",['categories'=>$Category]);

	}

}


// if(Auth::check()){
// 			$user=Auth::user();
// 			if($user->role ==0){
// 				return redirect()->route("home");
// 			}else{
// 				$Category = Category::all();
// 				return view("admin.dashboard",['categories'=>$Category]);
// 			}

// 		}
// 		else{
// 			return redirect()->route("home");
// 		}






