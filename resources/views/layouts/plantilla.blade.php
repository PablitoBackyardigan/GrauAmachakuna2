<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/plantilla.css'])
    <title>@yield('title')</title>
    @stack('styles')
</head>
<body>
    <header>
        <nav>
            <a href="{{route('home')}}">
                <img src="{{ asset('images/Logo.png') }}">
            </a>

            <ul>
                <li><a href="{{route('home')}}">Inicio</a></li>
                <li><a href="{{route('productos.index')}}">Productos</a></li>
                <li><a href="{{ route('cart.index') }}">Carrito</a></li>
                <li>
                    @auth
                        <form id="formLogOut" method="POST" action="{{ route('logout')}}" style="display: inline;">
                            @csrf
                            <a href="#" onclick="logoutFunction()">Log Out</a>
                        </form>
                        <script>
                            function logoutFunction() {
                                document.getElementById("formLogOut").submit();
                            }
                        </script>
                    @else
                        <a href="{{route('login')}}">Login</a>
                    @endauth
                </li>
                <li>
                    @auth

                    @else
                        <a href="{{route('register')}}">Register</a>
                    @endauth
                </li>   
                
            </ul>
        </nav>

        <div class="titulo">
            <h1> @yield('titulo') </h1>
        </div>
    </header>

    <div class="content">
        @yield('content')
    </div>

    <footer>
        <p>&copy; 2025 Todos los derechos reservados.</p>
    </footer>
</body>
</html>