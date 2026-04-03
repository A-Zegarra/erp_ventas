<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadSunat extends Model
{
    protected $fillable = [
        'codigo_sunat',
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
