<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('perros', function (Blueprint $table) {
            // Agregar la columna deleted_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perros', function (Blueprint $table) {
            // Si es necesario, definir la lógica para revertir los cambios
            $table->dropSoftDeletes();
        });
    }
};
