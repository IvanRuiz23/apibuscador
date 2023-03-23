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

    public function scopeStatus($query, $txt)
    {
        return $query->where('estatus', '=', $txt);
    }

    public function scopeOfSearch($query, $txt)
    {
        return $query->where('marca', 'LIKE', '%' . $txt . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $txt . '%');

    }
   
}
