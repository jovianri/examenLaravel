<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $primaryKey = 'nombre';
    public $timestamps = false;
    protected $fillable = ['nombre', 'ciudad'];
}
