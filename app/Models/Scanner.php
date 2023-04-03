<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scanner extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_comparativos',
        'np',
        'marca',
        'modelo',
        'digitalizador',
        'sensor',
        'roptica',
        'fluz',
        'rescaneo',
        'ecolor',
        'vescaneo',
        'adf',
        'ctrabajo',
        'voltaje',
        'cenergia',
        'software',
        'osc',
        'calimentador',
        'formatos',
        'twain',
        'salimentador',
        'conectividad',
        'puertos',
        'ccaja',
        'certificacion',
        'garantia'
    ];
}
