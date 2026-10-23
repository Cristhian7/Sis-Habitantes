@extends('Auth.auth')
@section('title', 'Iniciar Sesión')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
<div class="login-card">
    <div class="login-header">
        <h2>Bienvenido</h2>
        <p>Ingrese sus credenciales para continuar</p>
    </div>

    @if($errors->has('login_error'))
        <div class="alert-error">
            {{ $errors->first('login_error') }}
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" class="form-control" value="{{ old('usuario') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn-submit">Iniciar Sesión</button>
    </form>
</div>
@endsection
