<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadAdministrativa extends Model
{
    protected $table = 'unidad_administrativa';
    protected $primaryKey = 'unidad_administrativa_id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'unidad_administrativa_id',
        'unidad_administrativa_nombre',
        'unidad_administrativa_alias',
        'registro_estatus'
    ];

    protected $casts = [
        'registro_creacion' => 'datetime',
    ];

    const ESTATUS_ACTIVO = 'A';
    const ESTATUS_BAJA = 'B';

    public function solicitantes()
    {
        return $this->hasMany(Solicitante::class, 'unidad_administrativa_id', 'unidad_administrativa_id');
    }

    public function autorizacionesUnidadAdministrativa()
    {
        return $this->hasMany(AutorizacionUnidadAdministrativa::class, 'unidad_administrativa_id', 'unidad_administrativa_id');
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }
}