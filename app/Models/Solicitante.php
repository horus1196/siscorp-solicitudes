<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    protected $table = 'solicitante';
    protected $primaryKey = 'solicitante_id';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        //'solicitante_id',
        'solicitante_nombre',
        'solicitante_apellido_paterno',
        'solicitante_apellido_materno',
        'solicitante_curp',
        'solicitante_fecha',
        'solicitante_ip',
        'unidad_administrativa_id',
        'unidad_administrativa_cargo_id',
        'convenio_id',
        'solicitante_telefono',
        'solicitante_email',
        'registro_estatus'
    ];

    protected $casts = [
        'registro_creacion' => 'datetime',
    ];

    const ESTATUS_ACTIVO = 'A';
    const ESTATUS_BAJA = 'B';

    public function unidadAdministrativa()
    {
        return $this->belongsTo(UnidadAdministrativa::class, 'unidad_administrativa_id', 'unidad_administrativa_id');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'unidad_administrativa_cargo_id', 'cargo_id');
    }

    public function convenio()
    {
        return $this->belongsTo(Convenio::class, 'convenio_id', 'convenio_id');
    }

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'solicitante_id', 'solicitante_id');
    }

    public function autorizaciones()
    {
        return $this->belongsToMany(Autorizacion::class, 'autorizacion_solicitante', 'solicitante_id', 'autorizacion_id');
    }

    public function controls()
    {
        return $this->belongsToMany(Control::class, 'control_solicitante', 'solicitante_id', 'control_id');
    }

    public function getNombreCompletoAttribute()
    {
        return trim("{$this->solicitante_nombre} {$this->solicitante_apellido_paterno} {$this->solicitante_apellido_materno}");
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }
}