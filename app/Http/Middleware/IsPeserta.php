<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsPeserta
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'peserta') {
            return $next($request);
        }
        return redirect('/'); // kalau bukan peserta
    }
}
