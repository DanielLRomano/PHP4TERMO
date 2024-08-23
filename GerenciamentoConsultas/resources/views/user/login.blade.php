<!-- formulario de login -->
@extends('layouts.app')

@section('content')
{{-- formulario --}}
<br><br><br><br>
<div class="container">
    <h1>Login</h1>
    <form method="POST" action="{{ route('user.login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <a href="{{ route('user.registro') }}" class="btn btn-link">Criar conta</a>
        </div>


        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection