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

    public function scopeStatus($query)
    {
        return $query->where('estatus', '=', 'ON');
    }

    public function scopeOfSearch($query, $txt)
    {
        return $query->where('marca', 'LIKE', '%' . $txt . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $txt . '%');

    }
   
}
