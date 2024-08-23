@extends('layouts.app')

@section('content')

<br><br>
<h1 class="my-4">Consultas Médicas</h1>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<a class="btn btn-success mb-2" href="{{ route('consultas.create') }}">Criar Nova Consulta</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>N°</th>
            <th>Nome</th>
            <th>Especialidade</th>
            <th>Período</th>
            <th>Data da Consulta</th>
            <th>Status</th>
            <th width="280px">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($consultas as $consulta)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $consulta->nome }}</td>
            <td>{{ $consulta->especialidade }}</td>
            <td>{{ $consulta->horario }}</td>
            <td>{{ \Carbon\Carbon::parse($consulta->data_consulta)->format('d/m/Y') }}</td> <!-- Formata a data -->
            <td>{{ ucfirst($consulta->status) }}</td> <!-- Capitaliza o status -->
            <td>
                <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST" style="display:inline;">
                    <a class="btn btn-primary" href="{{ route('consultas.edit', $consulta->id) }}">Editar</a>
                    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esta consulta?')">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
