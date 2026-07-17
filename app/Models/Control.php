<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    protected $table = 'control';
    protected $primaryKey = 'control_id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'control_id',
        'transporte_id',
        'control_nombre',
        'registro_estatus'
    ];

    protected $casts = [
        'registro_creacion' => 'datetime',
    ];

    const ESTATUS_ACTIVO = 'A';
    const ESTATUS_BAJA = 'B';

    public function transporte()
    {
        return $this->belongsTo(Transporte::class, 'transporte_id', 'transporte_id');
    }

    public function controlSolicitantes()
    {
        return $this->hasMany(ControlSolicitante::class, 'control_id', 'control_id');
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }
}