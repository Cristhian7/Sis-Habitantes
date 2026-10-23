<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema')</title>
    
    <!-- Vite para compilar CSS y JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    
    @yield('styles')
</head>
<body class="@guest guest-layout @endguest">

    @auth
        <!-- Menú Lateral Izquierdo (Solo cuando ha iniciado sesión) -->
        <nav class="sidebar">
            <div class="sidebar-brand">
                Panel de Control
            </div>
            <ul class="sidebar-menu">
                <li><a href="{{ route('dashboard') }}">Inicio</a></li>
                 <li><a href="{{ route('cliente.index') }}">Clientes</a></li>
            </ul>
            <div class="sidebar-footer">
                <span class="user-info">Hola, <strong>{{ Auth::user()->usuario ?? 'Usuario' }}</strong></span>
                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit">Cerrar Sesión</button>
                </form>
            </div>
        </nav>
    @endauth

    <!-- Área de Trabajo Principal -->
    <div class="main-content" style="@guest width: 100%; height: 100vh; display: flex; justify-content: center; align-items: center; @endguest">

        <main class="@auth content-body @endauth" style="@guest width: 100%; display: flex; justify-content: center; align-items: center; @endguest">
            @yield('content')
        </main>
    </div>

</body>
</html>
