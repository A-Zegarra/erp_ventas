<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conductores', function (Blueprint $table) {
            $table->id();
            $table->string('numero_licencia', 30)->unique();
            $table->string('categoria_licencia', 20)->nullable();
            $table->string('tipo_documento', 20);
            $table->string('numero_documento', 20)->unique();
            $table->string('nombres_apellidos');
            $table->date('fecha_vencimiento_licencia')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('conductores');
    }
};
