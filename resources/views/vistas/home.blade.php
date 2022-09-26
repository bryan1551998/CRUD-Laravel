<!-- Heredo de la plantilla/welcome -->
@extends('plantilla/welcome')

<!-- Inicio de la seccion content -->
@section('content')

<div class="container">

    <div class=" container p-3">

        <!-- Mensaje que paso por el redirect -->
        @if(session('status'))
        <p class="error">
            {{session('status')}}
        </p>
        @endif

        <!-- Mensaje que paso por el redirect -->
        @if(session('noBorrar'))
        <p class="error">
            {{session('aglo')}}
        </p>
        @endif

        <h4 class="p-2  rounded text-white" id="titulo">Incidencias</h4>
        <table class="table" id="tabla">
            <thead id="tablaTitle">
                <tr>
                    <th class="thTitle">ID</th>
                    <th class="thTitle">User id</th>
                    <th class="thTitle">Calle</th>
                    <th class="thTitle">Ciudad</th>
                    <th class="thTitle">Piscina</th>
                    <th class="thTitle">Barrio</th>
                    @auth
                    <th class="thTitle"></th>
                    <th class="thTitle"></th>
                    @endauth

                </tr>
            </thead>
            <tbody>

                <?php


                foreach ($datosUsuario as $data) {

                    echo "<tr>";
                    echo "<td>" . $data->id . "</td>";
                    echo "<td>" . $data->user_id . "</td>";
                    echo "<td>" . $data->calle . "</td>";
                    echo "<td>" . $data->ciudad . "</td>";
                    echo "<td>" . $data->piscina . "</td>";
                    echo "<td>" . $data->barrio . "</td>";



                ?>
                    <!-- Si esta logeado => Puede borrar-->
                    @auth
                    <td>
                        <form method="POST" action="borrar" style="display: inline;">
                            @csrf
                            <input hidden value="{{$data->id}}" type="number" name="id_piso" />
                            <input hidden value="{{$data->user_id}}" type="number" name="id_user" />
                            <a href="#" onclick="this.closest('form').submit()">Borrar</a>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="editar">
                            @csrf
                            <input hidden value="{{$data->id}}" name="id" />
                            <input hidden value="{{$data->user_id}}" name="user_id" />
                            <input hidden value="{{$data->calle}}" name="calle" />
                            <input hidden value="{{$data->ciudad}}" name="ciudad" />
                            <input hidden value="{{$data->piscina}}" name="piscina" />
                            <input hidden value="{{$data->barrio}}" name="barrio" />
                            <a href="#" onclick="this.closest('form').submit()">Editar</a>
                        </form>


                    </td>
                    @endauth

                <?php
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>





    <script>
        var tabla = document.querySelector("#tabla");
        var datatable = new DataTable(tabla);

        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
</div>

@endsection('content')