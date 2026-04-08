<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Compra extends Model
{
    protected $fillable = [
        'fecha_emision',
        'tipo_comprobante',
        'serie',
        'numero',
        'proveedor_nombre',
        'proveedor_documento',
        'observacion',
        'subtotal',
        'igv',
        'total',
        'activo',
    ];
    protected function casts(): array
    {
        return [
            'fecha_emision' => 'date',
            'activo' => 'boolean',
        ];
    }
    public function detalles()
    {
        return $this->hasMany(CompraDetalle::class);
    }
}
