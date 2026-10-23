@extends('layouts.app')
@section('content')



<div style="max-width: 1100px; margin: 0 auto; padding: 1.5rem;">

   
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
        <h2 style="font-size: 1.5rem; font-weight: 700; color: #1e293b; margin: 0;">Listado de Clientes</h2>

       
        <a href="{{ route('cliente.create') }}" class="btn btn-success fw-semibold shadow-sm">
            Nuevo Cliente
        </a>
    </div>

    
    <form action="{{ route('cliente.index') }}" method="GET" style="margin-bottom: 1.5rem; display: flex; gap: 0.5rem; flex-wrap: wrap;">
        <input type="text" id="searchInput" name="search" placeholder="Buscar por nombre, apellido o DPI" value="{{ request('search') }}" style="flex: 1; min-width: 200px; padding: 0.5rem 0.75rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem;">
    </form>

    @if(session('success'))
    <div style="background-color: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; padding: 0.75rem 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.875rem;">
        {{ session('success') }}
    </div>
    @endif

    <div style="background: #ffffff; border-radius: 10px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem;">
            <thead>
                <tr style="background-color: #4d67bd; border-bottom: 1px solid #edf0e2; color: #010101; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">
                    <th style="padding: 0.75rem 1.5rem; width: 80px;">ID</th>
                    <th style="padding: 0.75rem 1.5rem;">Nombre</th>
                    <th style="padding: 0.75rem 1.5rem;">Apellido</th>
                    <th style="padding: 0.75rem 1.5rem;">Fecha nac</th>
                    <th style="padding: 0.75rem 1.5rem;">Edad</th>
                    <th style="padding: 0.75rem 1.5rem;">DPI</th>
                    <th style="padding: 0.75rem 1.5rem;">NIT</th>
                    <th style="padding: 0.75rem 1.5rem; text-align: center; width: 220px;">Acciones</th>
                </tr>
            </thead>

            <tbody style="color: #334155;">
                @forelse($clientes as $cliente)
                <tr class="cliente-row" style="border-bottom: 1px solid #f9f3f1;">
                    <td style="padding: 1rem 1.5rem; font-weight: 600; color: #64748b;">{{ $cliente->id_cliente }}</td>
                    
                    <td class="nombre_cliente" style="padding: 1rem 1.5rem; font-weight: 500; color: #0f172a;">
                        {{ $cliente->nombre_cliente }} {{ $cliente->apellido_cliente }}
                    </td>
                    
                    <td class="dpi_nit" style="padding: 1rem 1.5rem; color: #334155;">
                        {{ $cliente->dpi }} / {{ $cliente->nit }}
                    </td>

                    <td style="padding: 1rem 1.5rem; color: #334155;">
                        {{ $cliente->edad ?? \Carbon\Carbon::parse($cliente->fecha_nac)->age }} años
                    </td>

                    <td style="padding: 1rem 1.5rem; color: #334155;">
                        {{ $cliente->ubicacion_id_ubicacion }}
                    </td>

>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="padding: 2rem; text-align: center; color: #94a3b8; font-style: italic;">
                        No hay clientes registrados.
                    </td>
                </tr>
                @endforelse

                <!-- Fila oculta de respaldo para cuando el buscador no arroje resultados -->
                <tr id="noResultsRow" style="display: none;">
                    <td colspan="6" style="padding: 2rem; text-align: center; color: #94a3b8; font-style: italic;">
                        No se encontraron clientes coincidentes.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Paginación (si usas paginate() en el controlador) -->
    @if(method_exists($clientes, 'links'))
    <div style="margin-top: 1.5rem;">
        {{ $clientes->links() }}
    </div>
    @endif

</div>

@endsection