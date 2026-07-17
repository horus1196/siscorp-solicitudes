<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solicitud', function (Blueprint $table) {
            $table->integer('solicitud_id')->primary()->comment('Clave primaria de la tabla');
            $table->integer('solicitante_id')->comment('Id del solicitante');
            $table->integer('registro_id')->comment('Id del registro');
            $table->string('solicitud_folio', 255)->unique()->comment('Folio de la solicitud');
            $table->longText('solicitud_mail_asunto')->comment('Asunto del correo enviado');
            $table->longText('solicitud_mail_cuerpo')->comment('Cuerpo del correo enviado');
            $table->longText('solicitud_mail_error')->nullable()->comment('Error del mail devuelto por SMTP');
            $table->string('solicitud_pdf_path', 255)->nullable()->comment('Ruta relativa al archivo pdf generado');
            $table->timestamp('registro_creacion')->useCurrent()->comment('Fecha y hora de creación del registro');
            $table->char('registro_estatus', 1)->default('A')->comment('Estatus del registro (A: activo o B: baja)');
            
            // Foreign keys con nombres personalizados
            $table->foreign('solicitante_id', 'fk_solicitud_solicitante')
                  ->references('solicitante_id')->on('solicitante')
                  ->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreign('registro_id', 'fk_solicitud_registro')
                  ->references('registro_id')->on('registro')
                  ->onDelete('cascade')->onUpdate('cascade');
            
            // Índices con nombres personalizados
            $table->index('solicitante_id', 'idx_solicitud_solicitante');
            $table->index('registro_id', 'idx_solicitud_registro');
            $table->index('solicitud_folio', 'idx_solicitud_folio');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitud');
    }
};