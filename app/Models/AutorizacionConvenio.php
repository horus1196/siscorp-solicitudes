<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutorizacionConvenio extends Model
{
    protected $table = 'autorizacion_convenio';
    protected $primaryKey = 'autorizacion_convenio_id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'autorizacion_convenio_id',
        'convenio_id',
        'autorizacion_id',
        'registro_estatus'
    ];

    protected $casts = [
        'registro_creacion' => 'datetime',
    ];

    const ESTATUS_ACTIVO = 'A';
    const ESTATUS_BAJA = 'B';

    public function convenio()
    {
        return $this->belongsTo(Convenio::class, 'convenio_id', 'convenio_id');
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