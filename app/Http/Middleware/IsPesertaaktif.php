<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsPesertaaktif
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'peserta' && auth()->user()->status_akun === 'diterima') {
            return $next($request);
        }
        return redirect('/'); // kalau bukan peserta
    }
}
