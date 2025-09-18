@extends('layouts.app')

@section('contenido')
<style>
  /* Estilos tabla y botones (puedes adaptar a los tuyos) */
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

  .tabla-kartings tbody tr:hover {
      background-color: #f0f4ff;
      transition: background-color 0.3s ease;
  }

  .btn-editar {
      background-color: #6610f2;
      color: white;
      border: none;
  }

  .btn-editar:hover {
      background-color: #520dc2;
      color: white;
  }

  .btn-eliminar {
      background-color: #dc3545;
      color: white;
      border: none;
  }

  .btn-eliminar:hover {
      background-color: #a71d2a;
      color: white;
  }

  .titulo-principal {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-weight: 700;
      color: #3b3b98;
      margin-bottom: 30px;
      text-align: center;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
  }

  .btn-agregar {
      background: linear-gradient(45deg, #28a745, #218838);
      border: none;
      font-weight: 600;
  }

  .btn-agregar:hover {
      background: linear-gradient(45deg, #1e7e34, #145214);
      color: white;
  }

  /* Emoji karting animado */
  .karting-emoji {
    position: fixed;
    bottom: 20px;
    font-size: 2.5rem;
    animation: moverKarting 6s linear infinite;
    cursor: pointer;
    user-select: none;
    z-index: 9999;
  }

  @keyframes moverKarting {
    0% {
      left: -3rem;
    }
    100% {
      left: 100vw;
    }
  }

  .karting-emoji:hover {
    transform: scale(1.4) rotate(10deg);
    transition: transform 0.3s ease;
  }
</style>

<div class="container mt-5">
    <h1 class="titulo-principal">Lista de Kartings</h1>

    @if(session('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('exito') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('kartings.create') }}" class="btn btn-agregar px-4 py-2">+ Agregar nuevo karting</a>
    </div>

    @if($kartings->count())
        <table class="table tabla-kartings table-hover text-center align-middle">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Vueltas</th>
                    <th>Tiempo (segundos)</th>
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
                            <a href="{{ route('kartings.edit', $karting) }}" class="btn btn-sm btn-editar me-2">Editar</a>
                            <form action="{{ route('kartings.destroy', $karting) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro querés eliminar este karting?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-eliminar" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center fst-italic">No hay kartings cargados.</p>
    @endif
</div>

<!-- Emoji animado -->
<div class="karting-emoji" title="Karting animado" onclick="alert('¡Vamos rápido! 🏎️💨')">
  🏎️
</div>
@endsection
