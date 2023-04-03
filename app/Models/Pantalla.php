<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pantalla extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_comparativos',
        'np',
        'marca',
        'modelo',
        'tpantalla',
        'resolucion',
        'luzfondo',
        'pqi',
        'hdmi',
        'colores',
        'avisualizacion',
        'altavoces',
        'psalida',
        'audiobt',
        'codecaudio',
        'so',
        'tdigital',
        'sanalogico',
        'falimentacion',
        'cenergia',
        'puertos',
        'conectividad',
        'accesorios',
        'certificacion',
        'garantia'
    ];
}
