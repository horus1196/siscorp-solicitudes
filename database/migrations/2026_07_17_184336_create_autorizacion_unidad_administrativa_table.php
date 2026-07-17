<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('autorizacion_unidad_administrativa', function (Blueprint $table) {
            $table->integer('autorizacion_unidad_administrativa_id')->primary()->comment('Clave primaria de la tabla');
            $table->integer('unidad_administrativa_id')->comment('Id de la unidad administrativa');
            $table->integer('autorizacion_id')->comment('Id de la autorización');
            $table->timestamp('registro_creacion')->useCurrent()->comment('Fecha y hora de creación del registro');
            $table->char('registro_estatus', 1)->default('A')->comment('Estatus del registro (A: activo o B: baja)');
            
            // Foreign keys con nombres personalizados
            $table->foreign('unidad_administrativa_id', 'fk_autua_ua')
                  ->references('unidad_administrativa_id')->on('unidad_administrativa')
                  ->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreign('autorizacion_id', 'fk_autua_autorizacion')
                  ->references('autorizacion_id')->on('autorizacion')
                  ->onDelete('cascade')->onUpdate('cascade');
            
            // Índices con nombres personalizados
            $table->index('unidad_administrativa_id', 'idx_autua_ua');
            $table->index('autorizacion_id', 'idx_autua_autorizacion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('autorizacion_unidad_administrativa');
    }
};