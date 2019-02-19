<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('portada');
});

Route::get('/equipos', function () {
    return view('equipos');
});

Route::get('/equipo/{id}', function ($id) {
    return view('equipo')->with(['id' => $id]);
});

Route::get('/equipo/jugadores/{id}', function ($id) {
    return view('jugadores')->with(['id' => $id]);
});

Route::get('/jugador/{id}', function ($id) {
    return view('jugador')->with(['id' => $id]);
});

Route::get('/jugador/estadisticas/{id}', function ($id) {
    return view('estadisticas')->with(['id' => $id]);
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/compruebaLogin', 'usuario@compruebaLogin');