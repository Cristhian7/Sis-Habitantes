<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Cliente\ClienteController;


// Ruta inicial (Bienvenida)
Route::get('/', function () {
    //return view('welcome');//
    return view('auth.login');
});

// Ruta protegida del Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Rutas de Autenticación manejadas por el Controlador
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//Rutas para cliente
Route::get('/cliente', [App\Http\Controllers\Cliente\ClienteController::class, 'index'])->name('cliente.index');
Route::get('/cliente/create', [App\Http\Controllers\Cliente\ClienteController::class, 'create'])->name('cliente.create');
Route::post('/cliente', [App\Http\Controllers\Cliente\ClienteController::class, 'store'])->name('cliente.store');



