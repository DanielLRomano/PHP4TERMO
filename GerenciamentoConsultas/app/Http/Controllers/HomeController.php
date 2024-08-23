<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class HomeController extends Controller
{
    public function index()
    {
        // Pega os 3 últimos remédios disponíveis com base na data de criação
        $consultas = Consulta::where('disponivel', true)->latest()->take(3)->get();

        return view('home', compact('consultas'));
    }
}
