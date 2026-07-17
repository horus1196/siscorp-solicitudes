<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitud';
    protected $primaryKey = 'solicitud_id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'solicitud_id',
        'solicitante_id',
        'registro_id',
        'solicitud_folio',
        'solicitud_mail_asunto',
        'solicitud_mail_cuerpo',
        'solicitud_mail_error',
        'solicitud_pdf_path',
        'registro_estatus'
    ];

    protected $casts = [
        'registro_creacion' => 'datetime',
    ];

    const ESTATUS_ACTIVO = 'A';
    const ESTATUS_BAJA = 'B';

    public function solicitante()
    {
        return $this->belongsTo(Solicitante::class, 'solicitante_id', 'solicitante_id');
    }

    public function registro()
    {
        return $this->belongsTo(Registro::class, 'registro_id', 'registro_id');
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }
}