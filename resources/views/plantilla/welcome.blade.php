<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="/css/css.css" />
    <title>Inmobiliaria</title>

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


</head>

<body>
    <!-- Navbar content -->
    <div class="text-center bg-dark head pt-2">
        <p id="title">Practica CRUD Inmobiliaria</p>
    </div>

    <!-- Si no esta logeado => Registrar -->
    @guest
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">HOME</a>
            <div>

                <a href="/register">Registrar</a>
                <a href="/login">Login</a>

            </div>
        </div>
    </nav>
    @else
    <!-- Si esta logeado => Salir-->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">HOME</a>
            <div>
                <a href="/">Pisos</a>
                <a href="/insertar">Insertar</a>
                <form method="POST" action="/logout" style="display: inline;">
                    @csrf
                    <a href="#" onclick="this.closest('form').submit()">Salir</a>
                </form>
            </div>
        </div>
    </nav>
    @endguest

    <!-- Dinamic Content -->
    @yield('content')

    <!-- Foor content -->
    <div class="text-center bg-dark footer pt-2">
        <span id="fecha">
            -
        </span>
        <script>
            // Reloj
            setInterval(function() {
                //Crear un objeto Fecha
                var fecha = new Date()

                var h = fecha.getHours().toLocaleString()
                var m = fecha.getMinutes().toLocaleString()
                var s = fecha.getSeconds().toLocaleString()

                if (m <= 9) {
                    m = "0" + m
                }
                if (s <= 9) {
                    s = "0" + s
                }
                if (h <= 9) {
                    h = "0" + h
                }
                //Escribir la fecha
                document.getElementById("fecha").innerHTML = h + ":" + m + ":" + s
            }, 1000)

            //Evita que la pagina se pueda refrescar
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </div>
</body>

</html>