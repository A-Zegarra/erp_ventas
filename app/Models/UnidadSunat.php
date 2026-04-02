<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class UnidadSunat extends Model
{
    protected $fillable = [
        'codigo_sunat',
        'etiqueta',
        'activo',
    ];
    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
}
