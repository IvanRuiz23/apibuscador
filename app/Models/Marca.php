<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = "marcas";
    use HasFactory;

    protected $fillable = [
      'id',
      'nombre',
      'direccion' 
    ];
}
