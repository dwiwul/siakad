<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Guru
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::user()->level == "Admin") {
            return redirect()->route('admin');
        } else if (Auth::user()->level == "Pegawai") {
            return $next($request);
        } else if (Auth::user()->level == "Siswa") {
            return redirect()->route('siswa');
        }
    }
}
