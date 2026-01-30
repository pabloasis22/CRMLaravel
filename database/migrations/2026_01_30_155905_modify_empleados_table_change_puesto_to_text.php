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
        Schema::table('empleados', function (Blueprint $table) {
            // Eliminar la foreign key constraint
            $table->dropForeign(['puesto_id']);
            // Eliminar el campo puesto_id
            $table->dropColumn('puesto_id');
            // Agregar el nuevo campo puesto como texto
            $table->string('puesto')->after('telefono');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            // Eliminar el campo puesto
            $table->dropColumn('puesto');
            // Restaurar el campo puesto_id
            $table->unsignedBigInteger('puesto_id')->after('telefono');
            // Restaurar la foreign key
            $table->foreign('puesto_id')->references('id')->on('puestos')->onDelete('cascade');
        });
    }
};
