<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class useRole
{
   
    public function handle(Request $request, Closure $next): Response
    {
      if(Auth()->user()->role == 'peminjam' ){
        return redirect('/user');
      }
      if(Auth()->user()->role == 'admin' ){
        return redirect('/admin');
      }
      if(Auth()->user()->role == 'petugas' ){
        return redirect('/petugas');
      }
    }
}
