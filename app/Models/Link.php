<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = "links";
    use HasFactory;

    protected $fillable = [
        'marca',
        'descripcion',
        'links',
        'estatus'
    ];

    public function scopeOptionOne($query, $txt)
    {
        return $query->where('estatus', '=', $txt);
    }

    public function scopeOptionTwo($query, $txt, $txt1, $marca)
    {
        return $query->where('estatus', '=', $txt)
        ->where('descripcion', 'LIKE', '%' . $txt1 . '%')
        ->where('marca','=',$marca);
    }
}
