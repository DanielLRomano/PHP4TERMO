@extends('layouts.app')

@section('content')
<br><br><br>
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <!-- Área de Usuário -->
            <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded">
                <div>
                    <h5>Bem-vindo(a), {{{ ucfirst(Auth::user()->name) }}}!</h5>
                    <!-- ucfirst() transforma a primeira letra da string em maiúscula -->

                </div>
                <div>
                    <!-- Botão para acessar o perfil ou fazer logout -->
                    <a href="{{ route('user.logout') }}" class="btn btn-outline-danger btn-sm"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulário de Pesquisa -->
    <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control form-control-lg" placeholder="Pesquisar consultas..."
                value="{{ request('search') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary btn-lg">Pesquisar</button>
            </div>
        </div>
    </form>

    <!-- Lista de Consultas Disponíveis -->
    <div class="row">
        @if ($consultas->where('disponivel', true)->count() > 0)
            @foreach ($consultas->where('disponivel', true) as $consulta)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light">
                        <div class="card-body">
                            <h5 class="card-title">Médico(a): {{ $consulta->nome }}</h5>
                            <p class="card-text">Especialidade: {{ $consulta->especialidade }}</p>
                            <p class="card-text">Data da Consulta:
                                {{ \Carbon\Carbon::parse($consulta->data_consulta)->format('d/m/Y') }}
                            </p>
                            <p class="card-text">Horário da consulta:
                                {{ \Carbon\Carbon::parse($consulta->horario)->format('H:i') }}
                            </p>

                            <a href="{{ route('consultas.show', $consulta->id) }}" class="btn btn-primary">Ver Consulta</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <strong>Aviso:</strong> Não há consultas disponíveis no momento.
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Formulário de Logout -->
<form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@endsection