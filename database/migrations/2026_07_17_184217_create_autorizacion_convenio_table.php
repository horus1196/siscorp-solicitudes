<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('autorizacion_convenio', function (Blueprint $table) {
            $table->integer('autorizacion_convenio_id')->primary()->comment('Clave primaria de la tabla');
            $table->integer('convenio_id')->comment('Id del convenio');
            $table->integer('autorizacion_id')->comment('Id de la autorización');
            $table->timestamp('registro_creacion')->useCurrent()->comment('Fecha y hora de creación del registro');
            $table->char('registro_estatus', 1)->default('A')->comment('Estatus del registro (A: activo o B: baja)');
            
            // Foreign keys con nombres personalizados
            $table->foreign('autorizacion_id', 'fk_autconv_autorizacion')
                  ->references('autorizacion_id')->on('autorizacion')
                  ->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreign('convenio_id', 'fk_autconv_convenio')
                  ->references('convenio_id')->on('convenio')
                  ->onDelete('cascade')->onUpdate('cascade');
            
            // Índices con nombres personalizados
            $table->index('convenio_id', 'idx_autconv_convenio');
            $table->index('autorizacion_id', 'idx_autconv_autorizacion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('autorizacion_convenio');
    }
};