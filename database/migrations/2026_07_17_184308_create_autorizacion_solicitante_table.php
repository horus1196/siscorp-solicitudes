<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('autorizacion_solicitante', function (Blueprint $table) {
            $table->increments('autorizacion_solicitante_id')->comment('Clave primaria de la tabla');
            $table->unsignedInteger('solicitante_id')->comment('Id del solicitante');
            $table->unsignedInteger('autorizacion_id')->comment('Id de la autorización');
            $table->timestamp('registro_creacion')->useCurrent()->comment('Fecha y hora de creación del registro');
            $table->char('registro_estatus', 1)->default('A')->comment('Estatus del registro (A: activo o B: baja)');
            
            // Foreign keys con nombres personalizados
            $table->foreign('autorizacion_id', 'fk_autsolic_autorizacion')
                  ->references('autorizacion_id')->on('autorizacion')
                  ->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreign('solicitante_id', 'fk_autsolic_solicitante')
                  ->references('solicitante_id')->on('solicitante')
                  ->onDelete('cascade')->onUpdate('cascade');
            
            // Índices con nombres personalizados
            $table->index('solicitante_id', 'idx_autsolic_solicitante');
            $table->index('autorizacion_id', 'idx_autsolic_autorizacion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('autorizacion_solicitante');
    }
};