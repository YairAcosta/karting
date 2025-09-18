<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Proyecto Karting</title>

    {{-- Google Fonts: Oswald para títulos, Open Sans para texto --}}
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Open+Sans&display=swap" rel="stylesheet" />

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        /* Tipografías */
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #111; /* fondo oscuro */
            color: #eee;
        }
        h1, h2, h3, h4, h5 {
            font-family: 'Oswald', sans-serif;
            font-weight: 700;
        }

        /* Navbar personalizado */
        .navbar {
            background-color: #e10600; /* rojo intenso */
            box-shadow: 0 3px 6px rgba(0,0,0,0.5);
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .nav-link:hover {
            color: #ffec00 !important; /* amarillo */
            transition: color 0.3s;
        }

        /* Botones */
        .btn-primary {
            background-color: #e10600;
            border: none;
            box-shadow: 0 4px 8px rgba(225,6,0,0.6);
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        .btn-primary:hover {
            background-color: #ff2200;
            box-shadow: 0 6px 12px rgba(255,34,0,0.8);
        }
        .btn-secondary {
            background-color: #222;
            color: #eee;
            border: 1px solid #444;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-secondary:hover {
            background-color: #444;
            color: #fff;
        }

        /* Tarjetas */
        .karting-card {
            background: #222;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(225,6,0,0.6);
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        .karting-card:hover {
            transform: scale(1.03);
        }

        /* Alertas */
        .alert-success {
            background-color: #0f6400;
            border-color: #0a3e00;
            color: #caff9e;
            font-weight: 600;
        }

        /* Modal */
        .modal-header {
            background-color: #e10600;
            color: white;
            font-family: 'Oswald', sans-serif;
            font-weight: 700;
        }

        /* Footer */
        footer {
            background-color: #111;
            color: #555;
            padding: 15px 0;
            text-align: center;
            font-size: 0.9rem;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('kartings.index') }}">Karting Pro</a>
            <button class="navbar-toggler btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kartings.index') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kartings.create') }}">Agregar Karting</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="pt-5 mt-4">
        @yield('contenido')
    </main>

    <footer>
        &copy; {{ date('Y') }} Karting Pro - Todos los derechos reservados
    </footer>

    {{-- Bootstrap JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
