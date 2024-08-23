@extends('layouts.app')

@section('content')
<br><br><br>
<div class="container">
    <h1 class="mb-4">Meus Agendamentos</h1>

    <!-- Verifique se há mensagens de sucesso ou erro -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Verifica se há agendamentos -->
    @if ($agendamentos->count() > 0)
        <!-- Tabela de agendamentos -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Médico</th>
                    <th>Data da Consulta</th>
                    <th>Horário da Consulta</th>
                    <th>Data do Agendamento</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agendamentos as $agendamento)
                    <tr>
                        <td>{{ $agendamento->consulta->nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($agendamento->consulta->data_consulta)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($agendamento->consulta->horario)->format('H:i') }}</td>
                        <!-- Exibe somente a data do agendamento -->
                        <td>{{ \Carbon\Carbon::parse($agendamento->data_agendamento)->format('d/m/Y') }}</td>
                        <td>
                            <form method="POST" action="{{ route('agendamentos.cancel', $agendamento->id) }}"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Tem certeza que deseja cancelar este agendamento?')">Cancelar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info text-center">
            Nenhum agendamento encontrado.
        </div>
    @endif
</div>
@endsection