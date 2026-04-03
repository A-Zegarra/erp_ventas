<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('unidad_sunats', function (Blueprint $table) {
            $table->renameColumn('etiqueta', 'descripcion');
        });
    }

    public function down(): void
    {
        Schema::table('unidad_sunats', function (Blueprint $table) {
            $table->renameColumn('descripcion', 'etiqueta');
        });
    }
};
