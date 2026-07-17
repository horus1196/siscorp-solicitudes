<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('autorizacion', function (Blueprint $table) {
            $table->integer('autorizacion_id')->primary()->comment('Clave primaria de la tabla');
            $table->string('autorizacion_nombre', 255)->comment('Nombre de la autorización');
            $table->timestamp('registro_creacion')->useCurrent()->comment('Fecha y hora de creación del registro');
            $table->char('registro_estatus', 1)->default('A')->comment('Estatus del registro (A: activo o B: baja)');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('autorizacion');
    }
};