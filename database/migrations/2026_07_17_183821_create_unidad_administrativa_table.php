<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unidad_administrativa', function (Blueprint $table) {
            $table->increments('unidad_administrativa_id')->comment('Clave primaria de la tabla');
            $table->string('unidad_administrativa_nombre', 255)->comment('Nombre completo de la unidad administrativa');
            $table->string('unidad_administrativa_alias', 50)->comment('Nombre corto o acrónimo de la unidad administrativa');
            $table->timestamp('registro_creacion')->useCurrent()->comment('Fecha y hora de creación del registro');
            $table->char('registro_estatus', 1)->default('A')->comment('Estatus del registro (A: activo o B: baja)');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unidad_administrativa');
    }
};