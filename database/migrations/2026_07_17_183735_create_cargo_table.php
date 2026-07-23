<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cargo', function (Blueprint $table) {
            $table->increments('cargo_id')->comment('Clave primaria de la tabla');
            $table->string('cargo_nombre', 255)->comment('Puesto genérico dentro de la unidad administrativa');
            $table->timestamp('registro_creacion')->useCurrent()->comment('Fecha y hora de creación del registro');
            $table->char('registro_estatus', 1)->default('A')->comment('Estatus del registro (A: activo o B: baja)');
            
            $table->index('cargo_nombre', 'idx_cargo_nombre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cargo');
    }
};