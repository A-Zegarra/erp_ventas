<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Conductor extends Model
{
    protected $fillable = [
        'numero_licencia',
        'categoria_licencia',
        'tipo_documento',
        'numero_documento',
        'nombres_apellidos',
        'fecha_vencimiento_licencia',
        'activo',
    ];
}
