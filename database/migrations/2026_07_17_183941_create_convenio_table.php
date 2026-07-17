<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('convenio', function (Blueprint $table) {
            $table->integer('convenio_id')->primary()->comment('Clave primaria de la tabla');
            $table->string('convenio_dependencia', 255)->comment('Nombre completo de la dependencia');
            $table->string('convenio_puesto', 255)->comment('Nombre completo del puesto');
            $table->timestamp('registro_creacion')->useCurrent()->comment('Fecha y hora de creación del registro');
            $table->char('registro_estatus', 1)->default('A')->comment('Estatus del registro (A: activo o B: baja)');
            
            $table->index('convenio_dependencia', 'idx_convenio_dependencia');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('convenio');
    }
};