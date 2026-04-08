<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
public function up(): void
{
Schema::create('movimientos_inventario', function (Blueprint $table) {
$table->id();
$table->foreignId('producto_id')->constrained('productos')->restrictOnDelete();
$table->string('tipo_movimiento', 30);
$table->string('origen', 30)->nullable();
$table->unsignedBigInteger('origen_id')->nullable();
$table->decimal('cantidad', 12, 2);
$table->decimal('stock_anterior', 12, 2);
$table->decimal('stock_nuevo', 12, 2);
$table->string('detalle', 255)->nullable();
$table->timestamps();
});
}
public function down(): void
{
Schema::dropIfExists('movimientos_inventario');
}
};
