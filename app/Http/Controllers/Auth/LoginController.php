<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    // Form de login
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    { 
        $credenciales = $request->validate([
            'usuario' => ['required'], 
            'password' => ['required'],
        ], [
            'usuario.required' => 'El campo usuario es obligatorio.',
            'password.required' => 'El campo contraseña es obligatorio.',
        ]);

        if (Auth::attempt(['usuario' => $credenciales['usuario'], 'password' => $credenciales['password']])) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'login_error' => 'Usuario o contraseña incorrectos.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}