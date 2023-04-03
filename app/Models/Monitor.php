<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_comparativos',
        'np',
        'marca',
        'modelo',
        'tpantalla',
        'tareaactiva',
        'panel',
        'raspecto',
        'resolucion',
        'avisualizacion',
        'trespuesta',
        'colores',
        'facttualizacion',
        'brillo',
        'contraste',
        'gcolores',
        'antirreflejante',
        'curvatura',
        'inclinacion',
        'camara',
        'microfono',
        'altavoces',
        'touch',
        'cenergia',
        'alimentacion',
        'aenergia',
        'dimensiones',
        'peso',
        'certificaciones',
        'soc',
        'puertos',
        'accesorios',
        'garantia'
    ];
}
