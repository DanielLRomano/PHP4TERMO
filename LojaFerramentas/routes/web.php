<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdutoController;
use App\Http\Middleware\ProdutosMiddleware;
use App\Http\Controllers\HomeController;

// Página inicial com corrossel de produtos
Route::get('/', [HomeController::class, 'index'])->name('home');

//rota registro 
//rota para exibir o formulario de registro
Route::get('/registro', [UserController::class, 'showRegistroForm'])->
    name('usuarios.registro');

//rota para processar o registro
Route::post('/registro', [UserController::class, 'registro'])->
    name('usuarios.registro');


//rotas login

//rota para exibir o formulario de registro
Route::get('/login', [UserController::class, 'showLoginForm'])->
    name('usuarios.login');

//rota para processar o login
Route::post('/login', [UserController::class, 'login'])->
    name('usuarios.login');


//rota para a pagina interna

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')->name('dashboard');


//rota do logout
Route::post('/logout', [UserController::class, 'logout']);

//rota para Produtos
Route::resource('produtos', ProdutoController::class)->
    middleware(ProdutosMiddleware::class)->except('show');

//Visualização de um produto especifico 
Route::get('produtos/{produto}', [ProdutoController::class, 'show'])
    ->middleware('auth')->name('produtos.show');

//rota para adc produto no carrinho 
Route::post('carrinho/add/{produto}', [CarrinhoController::class, 'add'])
    ->middleware('auth')->name('carrinho.add');



