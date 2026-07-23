<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solicitante', function (Blueprint $table) {
            $table->increments('solicitante_id')->comment('Clave primaria de la tabla');
            $table->string('solicitante_nombre', 50)->comment('Nombre(s) del solicitante');
            $table->string('solicitante_apellido_paterno', 50)->comment('Apellido paterno del solicitante');
            $table->string('solicitante_apellido_materno', 50)->nullable()->comment('Apellido materno del solicitante');
            $table->string('solicitante_curp', 18)->comment('CURP del solicitante');
            $table->date('solicitante_fecha')->comment('Fecha del solicitante');
            $table->string('solicitante_ip', 255)->comment('Dirección IP');
            $table->unsignedInteger('unidad_administrativa_id')->comment('Id de la unidad administrativa');
            $table->unsignedInteger('unidad_administrativa_cargo_id')->nullable()->comment('Id del cargo del solicitante');
            $table->unsignedInteger('convenio_id')->nullable()->comment('Id de la dependencia gubernamental con convenio');
            $table->string('solicitante_telefono', 10)->comment('Teléfono del solicitante');
            $table->string('solicitante_email', 255)->comment('Email del solicitante');
            $table->timestamp('registro_creacion')->useCurrent()->comment('Fecha y hora de creación del registro');
            $table->char('registro_estatus', 1)->default('A')->comment('Estatus del registro (A: activo o B: baja)');
            
            // Foreign keys con nombres personalizados
            $table->foreign('unidad_administrativa_id', 'fk_solicitante_ua')
                  ->references('unidad_administrativa_id')->on('unidad_administrativa')
                  ->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreign('convenio_id', 'fk_solicitante_convenio')
                  ->references('convenio_id')->on('convenio')
                  ->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreign('unidad_administrativa_cargo_id', 'fk_solicitante_cargo')
                  ->references('cargo_id')->on('cargo')
                  ->onDelete('cascade')->onUpdate('cascade');
            
            // Índices con nombres personalizados
            $table->index(['solicitante_nombre', 'solicitante_apellido_paterno', 'solicitante_apellido_materno'], 'idx_solicitante_nombre');
            $table->index('unidad_administrativa_id', 'idx_solicitante_ua');
            $table->index('unidad_administrativa_cargo_id', 'idx_solicitante_cargo');
            $table->index('convenio_id', 'idx_solicitante_convenio');
            $table->index('solicitante_curp', 'idx_solicitante_curp');
            $table->index('solicitante_email', 'idx_solicitante_email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitante');
    }
};