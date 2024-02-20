<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class useRole
{

    public function handle(Request $request, Closure $next,string $role): Response
    {
        if(Auth()->user()->role == $role){
            return $next($request);
          }else{
            if(Auth()->user()->role == "admin"){
                return redirect('/admin');
              }
              if(Auth()->user()->role == "petugas"){
                return redirect('/petugas');
              }
              if(Auth()->user()->role == "peminjam"){
                return redirect('/peminjam');
              }
          }
    }
}
