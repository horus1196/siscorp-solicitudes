<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    protected $table = 'convenio';
    protected $primaryKey = 'convenio_id';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        //'convenio_id',
        'convenio_dependencia',
        'convenio_puesto',
        'registro_estatus'
    ];

    protected $casts = [
        'registro_creacion' => 'datetime',
    ];

    const ESTATUS_ACTIVO = 'A';
    const ESTATUS_BAJA = 'B';

    public function solicitantes()
    {
        return $this->hasMany(Solicitante::class, 'convenio_id', 'convenio_id');
    }

    public function autorizaciones()
    {
        return $this->belongsToMany(Autorizacion::class, 'autorizacion_convenio', 'convenio_id', 'autorizacion_id');
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }
}