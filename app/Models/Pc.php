<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pc extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_comparativos',
        'np',
        'marca',
        'modelo',
        'procesador',
        'graficos',
        'memoriaintegrada',
        'slotmemoria',
        'memoriamax',
        'storage',
        'lectorsd',
        'uniopt',
        'audio',
        'wlanbt',
        'teclado',
        'altavoz',
        'energia',
        'dimension',
        'peso',
        'puertos',
        'certific',
        'pruebmil',
        'so',
        'garantia'
    ];
}
