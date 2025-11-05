@extends('layouts.app')

@section('contenido')
<style>
    body {
        background: linear-gradient(135deg, #007bff, #6610f2);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-card {
        width: 100%;
        max-width: 400px;
        background: white;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        animation: fadeIn 0.8s ease;
    }

    .login-card h2 {
        text-align: center;
        color: #3b3b98;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-login {
        background: linear-gradient(45deg, #007bff, #6610f2);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-login:hover {
        opacity: 0.9;
        transform: scale(1.02);
    }

    .register-link {
        text-align: center;
        margin-top: 1rem;
    }

    .register-link a {
        color: #6610f2;
        text-decoration: none;
        font-weight: 600;
    }

    .register-link a:hover {
        text-decoration: underline;
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(-10px);}
        to {opacity: 1; transform: translateY(0);}
    }
</style>

<div class="container">
    <div class="login-card">
        <h2>Iniciar Sesión 🏎️</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-login w-100 py-2">Entrar</button>
        </form>

        <div class="register-link">
            ¿No tenés cuenta?
            <a href="{{ route('register') }}">Registrate aquí</a>
        </div>
    </div>
</div>
@endsection
