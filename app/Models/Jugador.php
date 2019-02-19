<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table = 'jugadores';
    protected $primaryKey = 'codigo';
    public $timestamps = false;
    protected $fillable = ['codigo', 'nombre'];
}
