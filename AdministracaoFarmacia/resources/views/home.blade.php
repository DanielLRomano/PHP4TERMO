@extends('layouts.app')


@section('content')
    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($produtos as $index => $produto)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src=" " class="d-block w-100" alt="{{ $produto->nome }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $produto->nome }}</h5>
                        <p>{{ $produto->descricao }}</p>
                        <p>Preço: R$ {{ $produto->preco }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection
