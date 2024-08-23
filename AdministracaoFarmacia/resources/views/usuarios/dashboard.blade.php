@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<div class="container">
    <h1>Dashboard de Produtos</h1>
<br>
    <form method="GET" action="{{ route('dashboard') }}">
        <input type="text" name="search" placeholder="Pesquisar produtos..." value="{{ request('search') }}">
        <button type="submit">Pesquisar</button>
        
    </form>
<br>
    <div class="row">
        @foreach ($produtos as $produto)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('/assets/img/canetaazul.webp'. $produto->imagem) }}" class="card-img-top" alt="{{ $produto->nome }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto->nome }}</h5>
                        <p class="card-text">{{ $produto->descricao }}</p>
                        <p class="card-text">{{ $produto->categoria }}</p>
                        <p class="card-text">Preço: R$ {{ $produto->preco }}</p>
                        <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-primary">Ver Produto</a>
                    </div>
                </div>
            </div>
            @endforeach
    
    </div>
</div>
@endsection