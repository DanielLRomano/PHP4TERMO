@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Criar Consulta</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Houve alguns problemas com sua entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('consultas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ old('nome') }}">
        </div>

        <div class="form-group">
            <label for="especialidade">Especialidade:</label>
            <input type="text" name="especialidade" class="form-control" placeholder="Especialidade"
                value="{{ old('especialidade') }}">
        </div>
        <div class="form-group">
            <label for="data_consulta">Data da Consulta:</label>
            <input type="date" name="data_consulta" class="form-control" value="{{ old('data_consulta') }}">
        </div>

        <div class="form-group">
            <label for="horario">Horário:</label>
            <input type="time" name="horario" class="form-control" value="{{ old('horario') }}" min="07:00" max="20:00">
        </div>



        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" class="form-control" placeholder="Status"
                value="{{ old('status', 'agendado') }}">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection