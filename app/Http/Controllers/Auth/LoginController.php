<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Form de login
    public function show()
    {
        return view('auth.login');
    }

    // Valida las credenciales con la data de BD
    public function login(Request $request)
    {
        // 1. Validar campos 
        $credenciales = $request->validate([
            'usuario' => ['required'], 
            'password' => ['required'],
        ], [
            'usuario.required' => 'El campo usuario es obligatorio.',
            'password.required' => 'El campo contraseña es obligatorio.',
        ]);

        // 2. Intentar autenticación con Auth::attempt (Laravel verifica automáticamente el hash)
        if (Auth::attempt(['usuario' => $credenciales['usuario'], 'password' => $credenciales['password']])) {
            $request->session()->regenerate();

            // Redirige al dashboard o la ruta protegida
            return redirect()->intended('dashboard');
        }

        // 3. Si falla la autenticación, regresa con error
        return back()->withErrors([
            'login_error' => 'Usuario o contraseña incorrectos.',
        ])->withInput();
    }

    // Opcional: Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
