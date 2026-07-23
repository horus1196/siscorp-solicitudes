<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutorizacionUnidadAdministrativa extends Model
{
    protected $table = 'autorizacion_unidad_administrativa';
    protected $primaryKey = 'autorizacion_unidad_administrativa_id';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        //'autorizacion_unidad_administrativa_id',
        'unidad_administrativa_id',
        'autorizacion_id',
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

    public function autorizacion()
    {
        return $this->belongsTo(Autorizacion::class, 'autorizacion_id', 'autorizacion_id');
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }
}