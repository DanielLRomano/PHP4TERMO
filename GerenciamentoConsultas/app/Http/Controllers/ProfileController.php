<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Método para exibir a página de perfil do usuário
    public function index()
    {
        $user = Auth::user(); // Obtém o usuário autenticado
        return view('profile.index', compact('user')); // Retorna a view do perfil com os dados do usuário
    }
}
