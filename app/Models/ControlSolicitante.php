<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ControlSolicitante extends Model
{
    protected $table = 'control_solicitante';
    protected $primaryKey = 'control_solicitante_id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'control_solicitante_id',
        'control_id',
        'solicitante_id',
        'registro_estatus'
    ];

    protected $casts = [
        'registro_creacion' => 'datetime',
    ];

    const ESTATUS_ACTIVO = 'A';
    const ESTATUS_BAJA = 'B';

    public function control()
    {
        return $this->belongsTo(Control::class, 'control_id', 'control_id');
    }

    public function solicitante()
    {
        return $this->belongsTo(Solicitante::class, 'solicitante_id', 'solicitante_id');
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }
}