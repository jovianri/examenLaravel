<?php
use \Illuminate\Support\Facades\DB;

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
    return view('inicio');
});

Route::get('/historia', function () {
    return view('historia');
});

Route::get('/jugadores', function () {
    return view('jugadores');
});

Route::get('/jugador/{id}', function ($id) {
    return view('jugador',['id' => $id]);
});

Route::get('/partidos', function () {
    return view('partidos');
});

Route::post('/partidos', function () {
    return view('partidos');
});

Route::get('/registrarse', function () {
    return view('registrarse');
});

Route::post('/registrarse', 'usuario@registrarse');

Route::get('/login', function () {
    return view('login');
});

Route::post('/compruebaLogin', 'usuario@compruebaLogin');
