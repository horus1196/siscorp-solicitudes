<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutorizacionSolicitante extends Model
{
    protected $table = 'autorizacion_solicitante';
    protected $primaryKey = 'autorizacion_solicitante_id';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        //'autorizacion_solicitante_id',
        'solicitante_id',
        'autorizacion_id',
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

    public function autorizacion()
    {
        return $this->belongsTo(Autorizacion::class, 'autorizacion_id', 'autorizacion_id');
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }
}