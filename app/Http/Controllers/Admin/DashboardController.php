<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;

class DashboardController extends Controller
{
    function index(){
    	$Category = Category::all();
    	return view("admin.dashboard",['categories'=>$Category]);
    }
   
}









