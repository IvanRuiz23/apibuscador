<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyector extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_comparativos',
        'np',
        'marca',
        'modelo',
        'sisproy',
        'lumens',
        'resnativ',
        'resaspnativ',
        'contraste',
        'color',
        'fluz',
        'vidaluz',
        'interfaces',
        'audio',
        'faliment',
        'cenergia',
        'ruido',
        'accesor',
        'dimensiones',
        'peso',
        'dproyeccion',
        'seguridad',
        'keystone',
        'zoom',
        'tempoper',
        'lente',
        'certificaciones',
        'garantia'
    ];
}
