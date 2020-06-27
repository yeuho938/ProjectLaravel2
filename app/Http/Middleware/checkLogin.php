<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\User;
class checkLogin
{
    public function handle($request, Closure $next){
        if(!Auth::check()){
            echo "Chưa đăng nhập vào trang web";
            return redirect('/home/user');
        }else{
            $user = Auth::user();

            if($user->role!=1){
                return redirect("/home/user");
            }
        }
        return $next($request);// chuyen tiep trang admin dashboard= ket thuc cau lenh ->de ket thuc qua trinh thuc thu function
    }
}
