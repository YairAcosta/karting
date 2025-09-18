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

    .btn-guardar {
        background: linear-gradient(45deg, #28a745, #218838);
        border: none;
        font-weight: 600;
        width: 100%;
        padding: 10px;
        font-size: 1.1rem;
    }

    .btn-guardar:hover {
        background: linear-gradient(45deg, #1e7e34, #145214);
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
    <h1>Crear nuevo Karting</h1>

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

    <form action="{{ route('kartings.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="mb-3">
            <label for="vueltas" class="form-label">Vueltas</label>
            <input type="number" name="vueltas" id="vueltas" class="form-control" value="{{ old('vueltas') }}" min="1" required>
        </div>

        <div class="mb-3">
            <label for="tiempo" class="form-label">Tiempo (segundos)</label>
            <input type="number" step="0.01" name="tiempo" id="tiempo" class="form-control" value="{{ old('tiempo') }}" min="0" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" name="categoria" id="categoria" class="form-control" value="{{ old('categoria') }}">
        </div>

        <div class="mb-3">
            <label for="fecha_carrera" class="form-label">Fecha de Carrera</label>
            <input type="date" name="fecha_carrera" id="fecha_carrera" class="form-control" value="{{ old('fecha_carrera') }}">
        </div>

        <button type="submit" class="btn btn-guardar">Guardar</button>
        <a href="{{ route('kartings.index') }}" class="btn btn-secondary btn-cancelar">Cancelar</a>
    </form>
</div>
@endsection
