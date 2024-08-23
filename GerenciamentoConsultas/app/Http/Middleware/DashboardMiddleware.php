<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar se o usuário está autenticado
        if (Auth::check()) {
            return $next($request);
        }

        // Redirecionar para a página de login caso o usuário não esteja autenticado
        return redirect('/')->with('error', 'Você precisa estar logado para acessar o dashboard.');
    }
}
