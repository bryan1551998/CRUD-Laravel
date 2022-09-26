<?php

namespace App\Http\Controllers;

use App\Models\Pisos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PisosController extends Controller
{

    public function index()
    {
        #Recupero los datos de la tabla pisos
        $datosUsuario =  Pisos::get();
        return view('vistas/home', ["datosUsuario" => $datosUsuario]);
    }


    public function create()
    {
        #Valido los datos del form
        request()->validate([
            "user_id" => ['required', 'string'],
            "calle" => ['required', 'string'],
            "ciudad" => ['required', 'string'],
            "piscina" => ['required', 'string'],
            "barrio" => ['required', 'string']
        ]);

        #Guardo las valores de request
        $u = request()->user_id;
        $calle = request()->calle;
        $ciudad = request()->ciudad;
        $p = request()->piscina;
        $b = request()->barrio;

        #Sentencia SQL
        Pisos::insert([
            "user_id" => "$u",
            "calle" => "$calle",
            "ciudad" => "$ciudad",
            "piscina" => "$p",
            "barrio" => "$b"
        ]);
        return redirect('/')->with('status', 'Se agrego el piso');
    }


    public function borrar()
    {
        #Capturo los datos
        $id_login = Auth::user()->id;
        $id_user = request()->id_user;
        $id_piso = request()->id_piso;

        #Compruebo si el user id_user es igual id_login
        if ($id_login == $id_user) {
            #Creo al query para borrar el piso
            Pisos::where('id', "$id_piso")->delete();
            return redirect('/')->with('status', 'Piso borrado');
        } else {
            return redirect('/')->with('status', 'No puedes borrar');
        }
    }

    public function editar()
    {

        $id = request()->id;
        $user_id = request()->user_id;
        $calle = request()->calle;
        $ciudad = request()->ciudad;
        $piscina = request()->piscina;
        $barrio = request()->barrio;

     

        $r = Pisos::where('id', " $id")->update(
            ['calle' => $calle,
             'ciudad' => $ciudad,
             'piscina'=> $piscina,
             'barrio'=>$barrio
            ],
        );

        return redirect('/')->with('Se actualizo el piso con id: '.$id);

    }
}
