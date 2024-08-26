@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <h2>Médico(a): {{ $consulta->nome }}</h2>
            <p><strong>Especialidade:</strong> {{ $consulta->especialidade }}</p>
            <p><strong>Data da consulta:</strong> {{ \Carbon\Carbon::parse($consulta->data_consulta)->format('d/m/Y') }}
            </p>
            <p><strong>Horário da consulta:</strong> {{ \Carbon\Carbon::parse($consulta->horario)->format('H:i') }}</p>

            <form method="POST" action="{{ route('agendamentos.store') }}">
                @csrf
                <input type="hidden" name="consulta_id" value="{{ $consulta->id }}">
                <button type="submit" class="btn btn-primary">Agendar consulta</button>
            </form>
        </div>
    </div>
</div>
@endsection