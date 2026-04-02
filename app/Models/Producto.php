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
        'stock_minimo',
        'afecto_igv',
        'activo',
    ];
    public function tipoProducto(): BelongsTo
    {
        return $this->belongsTo(TipoProducto::class);
    }
    public function unidadSunat(): BelongsTo
    {
        return $this->belongsTo(UnidadSunat::class);
    }
}
