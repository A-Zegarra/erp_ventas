<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MovimientoInventario extends Model
{
    protected $table = 'movimientos_inventario';
    protected $fillable = [
        'producto_id',
        'tipo_movimiento',
        'origen',
        'origen_id',
        'cantidad',
        'stock_anterior',
        'stock_nuevo',
        'detalle',
    ];
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
