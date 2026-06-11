<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRODUCTOS</title>
</head>
<body>
    <h1>Productos</h1>
    <nav>
        <ul>
            <li><a href="{{ route('productos.index') }}">Productos</a></li>
            <li><a href="#">Categorias</a></li>
        </ul>
    </nav>
    <hr>
    <main>
        {{-- Sección de mensajes automáticos --}}
        @if (session('success'))
          <div>
            <p>{{ session('success') }}</p>
          </div>
        @endif

        @if (session('error'))
          <div>
            <p style="color: red">{{ session('error') }}</p>              
          </div>
        @endif

        @yield('contenido')
    </main>
    <footer>
        <hr>
        &copy; 2026 - Desarrollo de Aplicaciones en Internet
    </footer>
</body>
</html>