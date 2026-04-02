<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Cliente extends Model
{
    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'nombre_razon_social',
        'direccion',
        'telefono',
        'email',
        'activo',
    ];
}
