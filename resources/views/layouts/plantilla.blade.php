<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/plantilla.css') }}">

    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="home">Inicio</a></li>
                <li><a href="productos">Productos</a></li>
                <li><a href="shopcart">Carro de Compras</a></li>
            </ul>
        </nav>

        <div class="titulo">
            <h1> @yield('titulo') </h1>
        </div>
    </header>

    @yield('content')

    <footer>
        <p>&copy; 2025 Todos los derechos reservados.</p>
    </footer>
</body>
</html>