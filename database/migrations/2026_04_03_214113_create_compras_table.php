<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
public function up(): void
{
Schema::create('compras', function (Blueprint $table) {
$table->id();
$table->date('fecha_emision');
$table->string('tipo_comprobante', 30)->default('FACTURA');
$table->string('serie', 10);
$table->string('numero', 20);
$table->string('proveedor_nombre', 150);
$table->string('proveedor_documento', 20)->nullable();
$table->text('observacion')->nullable();
$table->decimal('subtotal', 12, 2)->default(0);
$table->decimal('igv', 12, 2)->default(0);
$table->decimal('total', 12, 2)->default(0);
$table->boolean('activo')->default(true);
$table->timestamps();
});
}
public function down(): void
{
Schema::dropIfExists('compras');
}
};
