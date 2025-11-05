@extends('layouts.app')

@section('contenido')
<style>
    body {
        background: linear-gradient(135deg, #28a745, #20c997);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .register-card {
        width: 100%;
        max-width: 450px;
        background: white;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        animation: fadeIn 0.8s ease;
    }

    .register-card h2 {
        text-align: center;
        color: #198754;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-register {
        background: linear-gradient(45deg, #198754, #0d6efd);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-register:hover {
        opacity: 0.9;
        transform: scale(1.02);
    }

    .login-link {
        text-align: center;
        margin-top: 1rem;
    }

    .login-link a {
        color: #0d6efd;
        text-decoration: none;
        font-weight: 600;
    }

    .login-link a:hover {
        text-decoration: underline;
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(-10px);}
        to {opacity: 1; transform: translateY(0);}
    }
</style>

<div class="container">
    <div class="register-card">
        <h2>Crear Cuenta 🏁</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nombre completo</label>
                <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-register w-100 py-2">Registrarse</button>
        </form>

        <div class="login-link">
            ¿Ya tenés una cuenta?
            <a href="{{ route('login') }}">Iniciá sesión</a>
        </div>
    </div>
</div>
@endsection
