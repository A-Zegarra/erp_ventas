<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    protected $fillable = [
        'tipo_producto_id',
        'unidad_sunat_id',
        'codigo',
        'nombre',
        'descripcion',
        'precio_compra',
        'precio_venta',
        'stock_inicial',
        'stock_actual',
        'stock_minimo',
        'afecto_igv',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'precio_compra' => 'decimal:2',
            'precio_venta' => 'decimal:2',
            'stock_inicial' => 'decimal:2',
            'stock_actual' => 'decimal:2',
            'stock_minimo' => 'decimal:2',
            'afecto_igv' => 'boolean',
            'activo' => 'boolean',
        ];
    }

    public function tipoProducto(): BelongsTo
    {
        return $this->belongsTo(TipoProducto::class);
    }

    public function unidadSunat(): BelongsTo
    {
        return $this->belongsTo(UnidadSunat::class);
    }

    public function movimientosInventario()
    {
        return $this->hasMany(MovimientoInventario::class);
    }
}
