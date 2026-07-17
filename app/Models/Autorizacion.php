<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autorizacion extends Model
{
    protected $table = 'autorizacion';
    protected $primaryKey = 'autorizacion_id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'autorizacion_id',
        'autorizacion_nombre',
        'registro_estatus'
    ];

    protected $casts = [
        'registro_creacion' => 'datetime',
    ];

    const ESTATUS_ACTIVO = 'A';
    const ESTATUS_BAJA = 'B';

    public function convenios()
    {
        return $this->belongsToMany(Convenio::class, 'autorizacion_convenio', 'autorizacion_id', 'convenio_id');
    }

    public function solicitantes()
    {
        return $this->belongsToMany(Solicitante::class, 'autorizacion_solicitante', 'autorizacion_id', 'solicitante_id');
    }

    public function unidadesAdministrativas()
    {
        return $this->belongsToMany(UnidadAdministrativa::class, 'autorizacion_unidad_administrativa', 'autorizacion_id', 'unidad_administrativa_id');
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }
}