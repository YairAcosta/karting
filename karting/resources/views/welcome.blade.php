@extends('layouts.app')

@section('contenido')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="mb-4">🏁 Bienvenido a Karting Pro</h1>
        <h3 class="text-warning">
            ¡Hola, {{ Auth::user()->name }}!
        </h3>
        <p class="mt-3">
            Has iniciado sesión correctamente.  
            Ahora puedes gestionar tus kartings o agregar nuevos desde el menú superior.
        </p>

        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="btn btn-secondary">
                <i class="bi bi-box-arrow-right"></i> Cerrar sesión
            </button>
        </form>
    </div>
</div>
@endsection
