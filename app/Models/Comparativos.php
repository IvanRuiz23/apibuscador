<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comparativos extends Model
{
    protected $table = 'comparativos';
    use HasFactory;

    protected $fillable = [
        'nombre',
        'mejor',
        'comparador'
    ];
}
