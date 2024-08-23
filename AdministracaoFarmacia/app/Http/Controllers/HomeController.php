<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produto;

class HomeController extends Controller
{
    public function index()
    {
        $produtos = Produto::take(5)->get();
        return view('home', compact('produtos'));
    }
}