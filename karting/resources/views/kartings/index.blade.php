@extends('layouts.app')

@section('contenido')
<style>
  /* ===== Estilos de tabla ===== */
  .tabla-kartings {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  }

  .tabla-kartings thead {
      background: linear-gradient(45deg, #007bff, #6610f2);
      color: white;
      font-weight: 600;
      text-transform: uppercase;
  }

  .tabla-kartings tbody tr {
      transition: background-color 0.3s ease, transform 0.2s ease;
  }

  .tabla-kartings tbody tr:hover {
      background-color: #f0f4ff;
      transform: scale(1.01);
  }

  /* ===== Botones ===== */
  .btn-editar {
      background-color: #6610f2;
      color: white;
      border: none;
      border-radius: 6px;
      transition: all 0.3s ease;
  }

  .btn-editar:hover {
      background-color: #520dc2;
      color: #fff;
      transform: scale(1.05);
  }

  .btn-eliminar {
      background-color: #dc3545;
      color: white;
      border: none;
      border-radius: 6px;
      transition: all 0.3s ease;
  }

  .btn-eliminar:hover {
      background-color: #a71d2a;
      transform: scale(1.05);
  }

  .btn-agregar {
      background: linear-gradient(45deg, #28a745, #218838);
      border: none;
      font-weight: 600;
      color: white;
      padding: 10px 25px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
      transition: all 0.3s ease;
  }

  .btn-agregar:hover {
      background: linear-gradient(45deg, #1e7e34, #145214);
      transform: translateY(-2px);
  }

  .btn-logout {
      background: linear-gradient(45deg, #ff6b6b, #c0392b);
      border: none;
      font-weight: 600;
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
      transition: all 0.3s ease;
  }

  .btn-logout:hover {
      background: linear-gradient(45deg, #e74c3c, #992d22);
      transform: translateY(-2px);
  }

  /* ===== Título ===== */
  .titulo-principal {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-weight: 700;
      color: #3b3b98;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
      letter-spacing: 1px;
  }

  /* ===== Emoji Karting ===== */
  .karting-emoji {
      position: fixed;
      bottom: 20px;
      font-size: 2.8rem;
      animation: moverKarting 6s linear infinite;
      cursor: pointer;
      user-select: none;
      z-index: 9999;
  }

  @keyframes moverKarting {
      0% { left: -4rem; }
      100% { left: 100vw; }
  }

  .karting-emoji:hover {
      transform: scale(1.4) rotate(8deg);
      transition: transform 0.3s ease;
  }
</style>

<div class="container mt-5">
    <!-- Encabezado con título y botón de cerrar sesión -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="titulo-principal">🏁 Lista de Kartings</h1>
        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-logout">
                <i class="bi bi-box-arrow-right"></i> Cerrar sesión
            </button>
        </form>
    </div>

    {{-- Mensaje de éxito --}}
    @if(session('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('exito') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    {{-- Botón agregar --}}
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('kartings.create') }}" class="btn btn-agregar">
            <i class="bi bi-plus-circle me-1"></i> Agregar nuevo karting
        </a>
    </div>

    {{-- Tabla --}}
    @if($kartings->count())
        <div class="table-responsive">
            <table class="table tabla-kartings table-hover text-center align-middle">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Vueltas</th>
                        <th>Tiempo (s)</th>
                        <th>Categoría</th>
                        <th>Fecha de Carrera</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kartings as $karting)
                        <tr>
                            <td>{{ $karting->nombre }}</td>
                            <td>{{ $karting->vueltas }}</td>
                            <td>{{ $karting->tiempo }}</td>
                            <td>{{ $karting->categoria ?? '—' }}</td>
                            <td>{{ $karting->fecha_carrera ? \Carbon\Carbon::parse($karting->fecha_carrera)->format('d/m/Y') : '—' }}</td>
                            <td>
                                <a href="{{ route('kartings.edit', $karting) }}" class="btn btn-sm btn-editar me-2">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <form action="{{ route('kartings.destroy', $karting) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro querés eliminar este karting?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-eliminar" type="submit">
                                        <i class="bi bi-trash3"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center fst-italic mt-5">🚗 No hay kartings cargados todavía. ¡Agregá el primero!</p>
    @endif
</div>

<!-- Emoji animado -->
<div class="karting-emoji" title="Karting animado">
  🏎️
</div>
@endsection
