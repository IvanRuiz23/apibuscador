<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impresora extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_comparativos',
        'np',
        'marca',
        'modelo',
        'color',
        'timpresion',
        'vimpresion',
        'rimpresion',
        'ctmensual',
        'idoblecara',
        'emultiprop',
        'centrada',
        'csalida',
        'simpresion',
        'puertos',
        'conectividad',
        'cso',
        'sincluido',
        'ccaja',
        'certificacion',
        'garantia'
    ];
}
