@extends('layouts.app')
@section('title', 'Registrar Cliente')
@section('header_title', 'Gestión de Clientes')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Registrar Nuevo Cliente</h2>
        <a href="{{ route('cliente.index') }}" class="btn btn-success fw-semibold shadow-sm"></a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cliente.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre_cliente" class="form-label">Nombre</label>
                <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" value="{{ old('nombre_cliente') }}" required maxlength="45">
            </div>

            <div class="col-md-6 mb-3">
                <label for="apellido_cliente" class="form-label">Apellido</label>
                <input type="text" name="apellido_cliente" id="apellido_cliente" class="form-control" value="{{ old('apellido_cliente') }}" required maxlength="45">
            </div>

            <div class="col-md-6 mb-3">
                <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" value="{{ old('fecha_nac') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="text" name="edad" id="edad" class="form-control" value="{{ old('edad') }}" required maxlength="45">
            </div>

            <div class="col-md-6 mb-3">
                <label for="dpi" class="form-label">DPI</label>
                <input type="text" name="dpi" id="dpi" class="form-control" value="{{ old('dpi') }}" required maxlength="45">
            </div>

            <div class="col-md-6 mb-3">
                <label for="nit" class="form-label">NIT</label>
                <input type="text" name="nit" id="nit" class="form-control" value="{{ old('nit') }}" required maxlength="45">
            </div>

            <div class="col-md-6 mb-3">
                <label for="ubicacion_id_ubicacion" class="form-label">ID</label>
                <input type="number" name="ubicacion_id_ubicacion" id="ubicacion_id_ubicacion" class="form-control" value="{{ old('ubicacion_id_ubicacion') }}" required>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-primary">Guardar Cliente</button>
        </div>
    </form>
</div>
@endsection