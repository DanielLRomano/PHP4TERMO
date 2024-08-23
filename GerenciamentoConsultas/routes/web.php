<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\ConsultasMiddleware;
use App\Http\Middleware\AgendamentosMiddleware;
use App\Http\Middleware\DashboardMiddleware;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/registro', [UserController::class, 'showRegistroForm'])->name('user.registro');//showRegistroForm



Route::post('/registro', [UserController::class, 'registro'])->name('user.register');// Rota para processar o registro


Route::get('/login', [UserController::class, 'showLoginForm'])->// Rota para exibir o formulário de login
    name('user.login');

// Rota para processar o login
Route::post('/login', [UserController::class, 'login'])->
    name('user.login');
// Rota para logout
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');




// Rota para o dashboard, protegida por autenticação
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(DashboardMiddleware::class)->name('dashboard');



//routa p/ consultas
Route::resource('consultas', ConsultaController::class)->middleware(ConsultasMiddleware::class)->except('show');
//routa consulta especifico
Route::get('consultas/{consulta}', [ConsultaController::class, 'show'])->middleware('auth')->name('consultas.show');


/// Aplicar middleware 'agendamentos' ao grupo de rotas relacionadas a agendamentos
Route::middleware([AgendamentosMiddleware::class])->group(function () {

    // Rota para armazenar o agendamento de uma consulta
    Route::post('/consultas/{consulta}/agendar', [AgendamentoController::class, 'store'])
        ->name('agendamento.store');

    // Rota para exibir os agendamentos do usuário
    Route::get('/meus-agendamentos', [AgendamentoController::class, 'meusAgendamentos'])
        ->name('agendamentos.meus');

    // Rota para criar um novo agendamento
    Route::post('/agendamentos', [AgendamentoController::class, 'store'])
        ->name('agendamentos.store');

    // Rota para cancelar um agendamento
    Route::delete('/agendamentos/{id}/cancel', [AgendamentoController::class, 'cancel'])
        ->name('agendamentos.cancel');

    // Rota para o perfil do usuário
    Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');


    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');

});