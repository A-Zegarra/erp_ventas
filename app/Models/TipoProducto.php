<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'activo' => 'boolean',
        ];
    }
}
