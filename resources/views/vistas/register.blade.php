<!-- Heredo de la plantilla/welcome -->
@extends('plantilla/welcome')

<!-- Inicio de la seccion content -->
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4 mt-5 mb-5">

            <form method="POST" action="/register">

                <!-- Mensaje que paso por el redirect -->
                @if(session('status'))
                <p class="error">
                    {{session('status')}}
                </p>
                @endif

                <!-- Token de Larabel -->
                @csrf

                <label class="form-label" for="name">Usuario</label>
                <input autofocus class="form-control" type="text" id="name" name="name">
                <!-- Errores y validación -->
                <p class="error">
                    @error('name'){{ $message}} @enderror
                </p>

                <label class="form-label" for="password">Contraseña</label>
                <input class="form-control" type="password" id="password" name="password">
                <!-- Errores y validación -->
                <p class="error">
                    @error('password'){{ $message}} @enderror
                </p>

                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email">
                <!-- Errores y validación -->
                <p class="error">
                    @error('email'){{ $message}} @enderror
                </p>

                <label class="form-label" for="role">Role</label>
                <select name="role" id="role" class="form-select">
                    <option value=""><b> ROLE</b></option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <!-- Errores y validación -->
                <p class="error">
                    @error('role'){{ $message}} @enderror
                </p>

                <input class="btn btn-primary btn-block mt-2 mb-2" type="submit" value="Enviar">
            </form>
        </div>


    </div>
</div>

@endsection('content')