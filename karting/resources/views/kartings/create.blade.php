@extends('layouts.app')

@section('contenido')
<style>
    .form-create {
        max-width: 650px;
        margin: 60px auto;
        padding: 35px;
        background: linear-gradient(135deg, #eaffea, #d4f7d4);
        border-radius: 18px;
        box-shadow: 0 5px 18px rgba(0, 128, 0, 0.15);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-create h1 {
        text-align: center;
        color: #218838;
        font-weight: 700;
        margin-bottom: 30px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    .form-create .form-label {
        color: #145214;
        font-weight: 600;
    }

    .btn-guardar {
        background: linear-gradient(45deg, #28a745, #20c997);
        border: none;
        font-weight: 600;
        width: 100%;
        padding: 12px;
        font-size: 1.1rem;
        color: #fff;
        border-radius: 10px;
        transition: transform 0.2s ease;
    }

    .btn-guardar:hover {
        transform: scale(1.03);
        background: linear-gradient(45deg, #218838, #198754);
    }

    .btn-cancelar {
        display: block;
        margin-top: 15px;
        width: 100%;
        text-align: center;
    }
</style>

<div class="form-create">
    <h1>Nuevo Karting 🏁</h1>

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
            <input type="text" name="nombre" id="nombre" class="form-control" maxlength="20" required>
        </div>

        <div class="mb-3">
            <label for="vueltas" class="form-label">Vueltas</label>
            <input type="number" name="vueltas" id="vueltas" class="form-control" min="1" max="50" required>
        </div>

        <div class="mb-3">
            <label for="tiempo" class="form-label">Tiempo (segundos)</label>
            <input type="number" step="0.01" name="tiempo" id="tiempo" class="form-control" min="0" max="100" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" name="categoria" id="categoria" class="form-control" maxlength="10">
        </div>

        <div class="mb-3">
            <label for="fecha_carrera" class="form-label">Fecha de Carrera</label>
            <input type="date" name="fecha_carrera" id="fecha_carrera" class="form-control">
        </div>

        <button type="submit" class="btn btn-guardar">Guardar Karting</button>
        <a href="{{ route('kartings.index') }}" class="btn btn-outline-secondary btn-cancelar">Cancelar</a>
    </form>
</div>
@endsection
