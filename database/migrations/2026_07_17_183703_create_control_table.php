<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('control', function (Blueprint $table) {
            $table->increments('control_id')->comment('Clave primaria de la tabla');
            $table->unsignedInteger('transporte_id')->comment('Id del tipo de transporte');
            $table->string('control_nombre', 50)->default('')->comment('Nombre del tipo de vehículo');
            $table->timestamp('registro_creacion')->useCurrent()->comment('Fecha y hora de creación del registro');
            $table->char('registro_estatus', 1)->default('A')->comment('Estatus del registro (A: activo o B: baja)');
            
            $table->foreign('transporte_id', 'fk_control_transporte')
                  ->references('transporte_id')->on('transporte')
                  ->onDelete('cascade')->onUpdate('cascade');
            
            $table->index('transporte_id', 'idx_control_transporte');
            $table->index('control_nombre', 'idx_control_nombre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('control');
    }
};