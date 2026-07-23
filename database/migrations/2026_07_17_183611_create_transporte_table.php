<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transporte', function (Blueprint $table) {
            $table->increments('transporte_id')->comment('Clave primaria de la tabla');
            $table->string('transporte_nombre', 50)->comment('Nombre del tipo de transporte');
            $table->timestamp('registro_creacion')->useCurrent()->comment('Fecha y hora de creación del registro');
            $table->char('registro_estatus', 1)->default('A')->comment('Estatus del registro (A: activo o B: baja)');
            
            $table->index('transporte_nombre', 'idx_transporte_nombre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transporte');
    }
};