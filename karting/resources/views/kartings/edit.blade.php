@extends('layouts.app')

@section('contenido')
<style>
    .form-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 30px;
        background: #f8f9fa;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-container h1 {
        color: #3b3b98;
        font-weight: 700;
        text-align: center;
        margin-bottom: 25px;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
    }

    .btn-actualizar {
        background: linear-gradient(45deg, #6610f2, #520dc2);
        border: none;
        font-weight: 600;
        width: 100%;
        padding: 10px;
        font-size: 1.1rem;
        color: white;
    }

    .btn-actualizar:hover {
        background: linear-gradient(45deg, #4b0aa0, #39086e);
        color: white;
    }

    .btn-cancelar {
        width: 100%;
        margin-top: 10px;
    }

    .alert-danger ul {
        margin-bottom: 0;
    }
</style>

<div class="form-container">
    <h1>Editar Karting</h1>

    {{-- Errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kartings.update', $karting) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $karting->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="vueltas" class="form-label">Vueltas</label>
            <input type="number" name="vueltas" id="vueltas" class="form-control" value="{{ old('vueltas', $karting->vueltas) }}" min="1" required>
        </div>

        <div class="mb-3">
            <label for="tiempo" class="form-label">Tiempo (segundos)</label>
            <input type="number" step="0.01" name="tiempo" id="tiempo" class="form-control" value="{{ old('tiempo', $karting->tiempo) }}" min="0" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" name="categoria" id="categoria" class="form-control" value="{{ old('categoria', $karting->categoria) }}">
        </div>

        <div class="mb-3">
            <label for="fecha_carrera" class="form-label">Fecha de Carrera</label>
            <input type="date" name="fecha_carrera" id="fecha_carrera" class="form-control" value="{{ old('fecha_carrera', $karting->fecha_carrera ? \Carbon\Carbon::parse($karting->fecha_carrera)->format('Y-m-d') : '') }}">
        </div>

        <button type="submit" class="btn btn-actualizar">Actualizar</button>
        <a href="{{ route('kartings.index') }}" class="btn btn-secondary btn-cancelar">Cancelar</a>
    </form>
</div>
@endsection
