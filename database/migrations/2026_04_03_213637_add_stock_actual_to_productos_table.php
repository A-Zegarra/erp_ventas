<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
public function up(): void
{
Schema::table('productos', function (Blueprint $table) {
$table->decimal('stock_actual', 12, 2)->default(0)->after('stock_inicial');
});
DB::table('productos')->update([
'stock_actual' => DB::raw('stock_inicial')
]);
}
public function down(): void
{
Schema::table('productos', function (Blueprint $table) {
$table->dropColumn('stock_actual');
});
}
};
