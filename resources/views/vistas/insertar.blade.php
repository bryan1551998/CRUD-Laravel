<!-- Heredo de la plantilla/welcome -->
@extends('plantilla/welcome')

<!-- Inicio de la seccion content -->
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4 mt-5 mb-5">

            <form method="POST" action="/pisos">

                <!-- Mensaje que paso por el redirect -->
                @if(session('status'))
                <p class="error">
                    {{session('status')}}
                </p>
                @endif

                <!-- Token de Larabel -->
                @csrf

                <input  hidden  class="form-control" type="number" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                <!-- Errores y validación -->
                <p class="error">
                    @error('name'){{ $message}} @enderror
                </p>

                <label class="form-label" for="calle">Calle</label>
                <input autofocus class="form-control" type="text" id="calle" name="calle">
                <!-- Errores y validación -->
                <p class="error">
                    @error('calle'){{ $message}} @enderror
                </p>

                <label class="form-label" for="ciudad">Ciudad</label>
                <input  class="form-control" type="text" id="ciudad" name="ciudad">
                <!-- Errores y validación -->
                <p class="error">
                    @error('ciudad'){{ $message}} @enderror
                </p>

                <label class="form-label" for="piscina">Piscina</label>
                <input  class="form-control" type="number" id="piscina" name="piscina">
                <!-- Errores y validación -->
                <p class="error">
                    @error('piscina'){{ $message}} @enderror
                </p>

                <label class="form-label" for="barrio">Barrio</label>
                <select name="barrio" id="barrio" class="form-select">
                    <option value=""><b>Barrio</b></option>
                    <option value="Eixemple">Eixemple</option>
                    <option value="Gracia">Gracia</option>
                    <option value="Montjuic">Montjuic</option>
                </select>
                <!-- Errores y validación -->
                <p class="error">
                    @error('barrio'){{ $message}} @enderror
                </p>

                <input class="btn btn-primary btn-block mt-2 mb-2" type="submit" value="Enviar">
            </form>
        </div>


    </div>
</div>



<div class="container-fluid">
</div>


@endsection('content')