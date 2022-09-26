<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    #Creo el la funcion index que retorna la vista Home
    public function index()
    {
        #Llamo al meto request que trae lo que se ha enviado
        #en el form
        $credenciales = request()->validate(['name' => ['required', 'string'], 'password' => ['required', 'string']]);
        #Llamos al metodo attempt para verificar el 
        #password y user
        if (Auth::attempt($credenciales)) {
            #Evitar Session Fixation
            request()->session()->regenerate();
            return view('vistas/insertar');
        }
        return redirect('/login')->with('status', 'Error de credenciales');
    }

    #Creo el metodo logout para cerrear sesion
    public function logout()
    {
        #Invalida la sesion
        request()->session()->invalidate();
        #Regenera el toke
        request()->session()->regenerateToken();
        #Cierra la sesion
        Auth::logout();

        return redirect('/')->with('status', 'Has cerrado sesión');
    }

    #Creo el metodo register para crear un usuario
    public function register()
    {
        #valido los campos del form
        request()->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
            'email' => ['required', 'string'],
            'role' => ['required', 'string']
        ]);

        #Guardo los valores del request
        $n = request()->name;
        $e = request()->email;
        $p =   Hash::make(request()->password);
        $r = request()->role;

        #Pregunto si existe un usuario
        if (User::where('name', "$n")->value('name') == null) {
            #Creo la sentencia SQL
            User::insert(['name' => "$n", 'email' => "$e", 'password' => "$p", 'role' => "$r"]);
            return redirect('/login')->with('status', 'Usuario Creado');
        }

        return redirect('/register')->with('status', 'Usuario ya EXISTE');
    }
}
