<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('control_solicitante', function (Blueprint $table) {
            $table->increments('control_solicitante_id')->comment('Clave primaria de la tabla');
            $table->unsignedInteger('control_id')->comment('Id del tipo de control');
            $table->unsignedInteger('solicitante_id')->comment('Id del solicitante');
            $table->timestamp('registro_creacion')->useCurrent()->comment('Fecha y hora de creación del registro');
            $table->char('registro_estatus', 1)->default('A')->comment('Estatus del registro (A: activo o B: baja)');
            
            // Foreign keys con nombres personalizados
            $table->foreign('control_id', 'fk_ctrlsol_control')
                  ->references('control_id')->on('control')
                  ->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreign('solicitante_id', 'fk_ctrlsol_solicitante')
                  ->references('solicitante_id')->on('solicitante')
                  ->onDelete('cascade')->onUpdate('cascade');
            
            // Índices con nombres personalizados
            $table->index('control_id', 'idx_ctrlsol_control');
            $table->index('solicitante_id', 'idx_ctrlsol_solicitante');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('control_solicitante');
    }
};