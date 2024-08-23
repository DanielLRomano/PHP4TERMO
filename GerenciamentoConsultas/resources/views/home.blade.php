@extends('layouts.app')

@section('content')
<div class="container mt-5"><br><br>
    <h1 class="mb-4 text-center">Consultas disponíveis</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div>
        <h2>Bem vindo</h2>
    </div>


    @auth
        @if ($consultas->where('disponivel', true)->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Médico</th>
                        <th>Especialidade</th>
                        <th>Data da Consulta</th>
                        <th>Horário</th>
                        <th>Disponível</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consultas->where('disponivel', true) as $consulta)
                        <tr>
                            <td>{{ $consulta->nome }}</td>
                            <td>{{ $consulta->especialidade }}</td>
                            <td>{{ \Carbon\Carbon::parse($consulta->data_consulta)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($consulta->horario)->format('H:i') }}</td>
                            <td>{{ $consulta->disponivel ? 'Sim' : 'Não' }}</td>
                            <td>
                                <form method="POST" action="{{ route('agendamentos.store') }}">
                                    @csrf
                                    <input type="hidden" name="consulta_id" value="{{ $consulta->id }}">
                                    <button type="submit" class="btn btn-primary">Agendar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted text-center">Não há consultas disponíveis no momento.</p>
        @endif
    @else
    @endauth
</div>
@endsection