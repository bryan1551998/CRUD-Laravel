<?php

use App\Http\Controllers\PisosController;
use Illuminate\Support\Facades\Route;

#Llamo al controlador UsuariosController
use App\Http\Controllers\UserController;

#Ruta raiz
Route::get('/', [PisosController::class, 'index']);



#Creo la ruta 'login' que regresa a una vista Login middleware siempre busca
#una ruta llamada LOGIN
Route::view('login', 'vistas/login')->name('login')->middleware('guest');

#Creo la ruta '/home' (esta ruta la creo para el fom
#de login) que llama al metro index  del controlador User 
Route::post('insertar', [UserController::class, 'index']);

#Proteger la ruta Home
Route::view('insertar', 'vistas/insertar')->middleware('auth');

#Crear ruta para logout
Route::post('logout', [UserController::class, 'logout']);

#Crear ruta register link
Route::view('register', 'vistas/register')->middleware('guest');

#Crear la ruta register para el form
Route::post('register', [UserController::class, 'register']);

#Crear una ruta para guardar los pisos
Route::post('pisos', [PisosController::class, 'create']);

#Crear una ruta para borrar los pisos
Route::post('borrar', [PisosController::class, 'borrar']);

#Crear una ruta para editar los pisos 
Route::post('editar', function () {
    return view('vistas/editar', request());
});

#Crear una ruta evitar que nos accedan a editar por GET
Route::get('editar', function () {
    return redirect('/');
});

#Crear una ruta para actulizar los pisos 
Route::post('update', [PisosController::class, 'editar']);


