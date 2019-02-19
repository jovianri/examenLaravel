<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Models\Equipo;

class EquipoController extends Controller
{
    public function getAll() {

        $equipos = Equipo::all();
        return view('equipos')->with(['equipos' => $equipos]);
    }
}
