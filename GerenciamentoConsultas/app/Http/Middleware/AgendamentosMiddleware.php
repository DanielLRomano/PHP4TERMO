<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AgendamentosMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário está autenticado
        if (!Auth::check()) {
            return redirect('/login')->withErrors('Você precisa estar logado para acessar essa página.');
        }

        // Verifica se o usuário tem permissão para acessar os agendamentos
        // Por exemplo, se você deseja permitir que um usuário veja apenas seus próprios agendamentos:
        $agendamentoId = $request->route('agendamento'); // Supondo que você passe o ID do agendamento na rota
        $agendamento = \App\Models\Agendamento::find($agendamentoId);

        if ($agendamento && $agendamento->user_id !== Auth::id()) {
            return redirect('/')->withErrors('Você não tem permissão para acessar este agendamento.');
        }

        return $next($request);
    }
}
