<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_producto_id')->constrained('tipo_productos');
            $table->foreignId('unidad_sunat_id')->constrained('unidad_sunats');
            $table->string('codigo', 50)->unique();
            $table->string('nombre', 150);
            $table->text('descripcion')->nullable();
            $table->decimal('precio_compra', 10, 2)->default(0);
            $table->decimal('precio_venta', 10, 2)->default(0);
            $table->decimal('stock_inicial', 10, 2)->default(0);
            $table->decimal('stock_minimo', 10, 2)->default(0);
            $table->boolean('afecto_igv')->default(true);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
