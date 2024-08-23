<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\Consulta;
use Illuminate\Support\Facades\Auth;

class AgendamentoController extends Controller
{
    // Método para agendar uma consulta
    public function store(Request $request)
    {
        // Validar o ID da consulta
        $request->validate([
            'consulta_id' => 'required|exists:consultas,id',
        ]);
    
        // Obter o ID do usuário autenticado
        $userId = Auth::id();
    
        // Obter o ID da consulta do request
        $consultaId = $request->input('consulta_id');
    
        // Obter a consulta correspondente
        $consulta = Consulta::findOrFail($consultaId);
    
        // Verificar se a consulta está disponível
        if (!$consulta->disponivel) {
            return redirect()->back()->with('error', 'A consulta não está mais disponível.');
        }
    
        // Criar o agendamento
        Agendamento::create([
            'consulta_id' => $consultaId,
            'user_id' => $userId,
            'data_agendamento' => now(), // Definindo a data do agendamento
        ]);
    
        // Marcar a consulta como não disponível
        $consulta->update(['disponivel' => false]);
    
        return redirect()->route('home')->with('success', 'Consulta agendada com sucesso.');
    }
    
    

    // Método para listar os agendamentos do usuário autenticado
    public function meusAgendamentos()
    {
        // Obter o ID do usuário autenticado
        $userId = Auth::id();

        // Buscar os agendamentos desse usuário
        $agendamentos = Agendamento::where('user_id', $userId)
                                   ->with('consulta') // Assegure-se de que a relação está definida no modelo Agendamento
                                   ->get();

        // Retornar a view com os agendamentos
        return view('agendamentos.meus_agendamentos', compact('agendamentos'));
    }


    public function cancel($id)
    {
        $agendamento = Agendamento::findOrFail($id);

        // Marcar consulta como disponível novamente
        $consulta = $agendamento->consulta;
        $consulta->disponivel = true;
        $consulta->save();

        // Excluir o agendamento
        $agendamento->delete();

        return redirect()->route('home')->with('success', 'Agendamento cancelado com sucesso.');
    }
}
