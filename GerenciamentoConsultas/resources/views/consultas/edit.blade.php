@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Editar Consulta</h1>

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

    <form action="{{ route('consultas.update', $consulta->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $consulta->nome) }}"
                placeholder="Nome" required>
        </div>

        <div class="form-group">
            <label for="especialidade">Especialidade:</label>
            <input type="text" name="especialidade" class="form-control"
                value="{{ old('especialidade', $consulta->especialidade) }}" placeholder="Especialidade" required>
        </div>

        <div class="form-group">
            <label for="data_consulta">Data da Consulta:</label>
            <input type="date" name="data_consulta" class="form-control"
                value="{{ old('data_consulta', $consulta->data_consulta) }}" required>
        </div>

        <div class="form-group">
            <label for="horario">Horário:</label>
            <input type="time" name="horario" class="form-control" value="{{ old('horario', $consulta->horario) }}"
                min="07:00" max="20:00" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" class="form-control" value="{{ old('status', $consulta->status) }}"
                placeholder="Status" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection