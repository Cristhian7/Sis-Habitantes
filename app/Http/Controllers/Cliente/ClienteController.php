<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente\Cliente;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ClienteController
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        $request->validate
        ([
            'nombre_cliente' => 'required|string|max:45',
            'apellido_cliente' => 'required|string|max:45',
            'fecha_nac'=> 'required|date',
            'dpi' => 'required|string|max:45',
            'nit' => 'required|string|max:45',
            'ubicacion_id_ubicacion' => 'required|integer',
        ]);

        $edad = Carbon::parse($request->fecha_nac)->age;

        if ($edad < 25 || $edad > 60) {
            return back()->withErrors(['fecha_nac' => 'El aspirante debe tener entre 25 y 60 años de edad.'])->withInput();
        }

        $datos = $request->all();        
        $datos['edad'] = $edad;
        Cliente::create($datos);
       

        return redirect()->route('cliente.index')->with('success', 'Cliente registra creadodo exitosamente.');
    }
}