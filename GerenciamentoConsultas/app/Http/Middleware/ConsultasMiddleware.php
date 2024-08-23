<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ConsultasMiddleware
{
    /**
     * Manipula uma requisição recebida.
     *
     * @param  \Illuminate\Http\Request  $request  A requisição HTTP recebida.
     * @param  \Closure  $next  O próximo middleware ou a requisição que será tratada.
     * @return \Symfony\Component\HttpFoundation\Response  A resposta HTTP que será retornada.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário está autenticado e se ele tem a função de médico
        if (Auth::check() && Auth::user()->isMedico()) {
            // Se o usuário for um médico, permite a continuação da requisição
            return $next($request);
        }

        // Se o usuário não for autenticado ou não for um médico, redireciona para a página inicial
        // Exibe uma mensagem de erro indicando que o acesso foi negado
        return redirect('/')->withErrors('Acesso negado -> Você não tem permissão.');
    }
}
