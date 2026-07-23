<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registro', function (Blueprint $table) {
            $table->increments('registro_id')->comment('Clave primaria de la tabla');
            $table->string('registro_oficio', 255)->comment('Número de oficio que se usará para la solicitud');
            $table->date('registro_oficio_fecha')->comment('Fecha del oficio que se usará para la solicitud');
            $table->string('registro_nombre', 50)->comment('Nombre de la persona que realiza el registro');
            $table->string('registro_apellido_paterno', 50)->comment('Apellido paterno de la persona que realiza el registro');
            $table->string('registro_apellido_materno', 50)->nullable()->comment('Apellido materno de la persona que realiza el registro');
            $table->string('registro_email', 255)->comment('Correo de la persona que realiza el registro');
            $table->timestamp('registro_creacion')->useCurrent()->comment('Fecha y hora de creación del registro');
            $table->char('registro_estatus', 1)->default('A')->comment('Estatus del registro (A: activo o B: baja)');
            
            // Índices con nombres personalizados más cortos
            $table->index(['registro_nombre', 'registro_apellido_paterno', 'registro_apellido_materno'], 'idx_registro_nombre');
            $table->index('registro_oficio', 'idx_registro_oficio');
            $table->index('registro_email', 'idx_registro_email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registro');
    }
};