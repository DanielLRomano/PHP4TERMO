@extends('layouts.app')

@section('content')
{{-- formulário --}}
<br><br><br><br>
<div class="container">
    <h1>Registrar-se</h1>
    <form method="POST" action="{{ route('user.registro') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            @if ($errors->has('name'))
                <small class="text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
            @if ($errors->has('email'))
                <small class="text-danger">{{ $errors->first('email') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" class="form-control" required>
            @if ($errors->has('password'))
                <small class="text-danger">{{ $errors->first('password') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirme a Senha</label>
            <input type="password" name="password_confirmation" class="form-control" required>
            @if ($errors->has('password_confirmation'))
                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Registrar-se</button>
    </form>
</div>
@endsection