<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckLoginRole
{
    public function handle($request, Closure $next)
    {
      if(!Auth::check())
      {
       echo "Chưa đăng nhập vào trang web";
       return redirect('home');
   } 
   $user = Auth::user();
   if($user->role !=1)
   {
    return redirect("home");
}
if($user->role ==1)
{
    return redirect("/admin/dashboard");
}
return $next($request);

}
}