@extends('layouts.app')

@section('contenido')
<style>
    body {
        background: linear-gradient(135deg, #2b2b2b, #3a3a3a);
        color: #e2e2e2;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-container {
        max-width: 600px;
        margin: 60px auto;
        padding: 35px;
        background: #2f2f2f;
        border-radius: 14px;
        border: 1px solid #444;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .form-container:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
    }

    .form-container h1 {
        color: #d45757;
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
        letter-spacing: 0.5px;
        text-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
    }

    label.form-label {
        font-weight: 600;
        color: #e0e0e0;
    }

    input.form-control {
        background-color: #3c3c3c;
        color: #f1f1f1;
        border: 1px solid #555;
        border-radius: 10px;
        transition: border-color 0.2s, box-shadow 0.2s, background-color 0.2s;
    }

    input.form-control:focus {
        border-color: #d45757;
        box-shadow: 0 0 6px rgba(212, 87, 87, 0.4);
        background-color: #454545;
    }

    .btn-guardar {
        background: linear-gradient(90deg, #d45757, #a73f3f);
        border: none;
        font-weight: 600;
        width: 100%;
        padding: 12px;
        font-size: 1.1rem;
        color: #fff;
        border-radius: 10px;
        transition: background 0.3s, transform 0.2s;
    }

    .btn-guardar:hover {
        background: linear-gradient(90deg, #e06565, #943232);
        transform: scale(1.02);
        box-shadow: 0 0 10px rgba(212, 87, 87, 0.3);
    }

    .btn-cancelar {
        width: 100%;
        margin-top: 12px;
        padding: 10px;
        border-radius: 10px;
        background-color: #4a4a4a;
        border: none;
        color: #ddd;
        transition: background 0.3s, color 0.3s;
    }

    .btn-cancelar:hover {
        background-color: #5a5a5a;
        color: #fff;
    }

    .alert-danger {
        border-radius: 10px;
        background: #3b1f1f;
        border: 1px solid #a85c5c;
        color: #f2bcbc;
        box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

</style>

<div class="form-container">
    <h1>🏁 Editar Karting</h1>

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

    <form action="{{ route('kartings.update', $karting->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control"
                value="{{ old('nombre', $karting->nombre) }}" maxlength="25" minlength="3" required>
        </div>

        <div class="mb-3">
            <label for="vueltas" class="form-label">Vueltas</label>
            <input type="number" name="vueltas" id="vueltas" class="form-control"
                value="{{ old('vueltas', $karting->vueltas) }}" min="1" max="99" required>
        </div>

        <div class="mb-3">
            <label for="tiempo" class="form-label">Tiempo (segundos)</label>
            <input type="number" step="0.01" name="tiempo" id="tiempo" class="form-control"
                value="{{ old('tiempo', $karting->tiempo) }}" min="0" max="1000" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" name="categoria" id="categoria" class="form-control"
                value="{{ old('categoria', $karting->categoria) }}" maxlength="20">
        </div>

        <div class="mb-3">
            <label for="fecha_carrera" class="form-label">Fecha de Carrera</label>
            <input type="date" name="fecha_carrera" id="fecha_carrera" class="form-control"
                value="{{ old('fecha_carrera', $karting->fecha_carrera) }}">
        </div>

        <button type="submit" class="btn btn-guardar">Actualizar</button>
        <a href="{{ route('kartings.index') }}" class="btn btn-cancelar">Cancelar</a>
    </form>
</div>
@endsection
