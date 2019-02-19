<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;

class JugadorController extends Controller
{
    public function getAllJugadores() {
        $jugadores = Jugador::all();
        return view('jugadores')->with(['jugadores' => $jugadores]);
    }

    public function getJugadoresEquipo($equipo) {
        $jugadores = Jugador::where('Nombre_equipo', '=', $equipo)
            ->get();
        return view('jugadores')->with(['jugadores' => $jugadores]);
    }

    public function setJugador() {
        $jugador = new Jugador([
            'codigo' => 0,
            'Nombre' => 'prueba'
        ]);
        $jugador->save();

        echo 'Creado jugador con código 0';
    }

    public function modJugador() {
        $jugador = Jugador::find(0);
        $jugador->nombre = 'prueba2';
        $jugador->save();
    }

    public function delJugador() {
        $jugador = Jugador::find(0);
        $jugador->delete();
    }
}
