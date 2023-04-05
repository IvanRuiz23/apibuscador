<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaginaWeb extends Model
{
    protected $table = 'paginasweb';
    use HasFactory;

    protected $fillable = [
        'titulo',
        'link',
        'activo'
    ];


}