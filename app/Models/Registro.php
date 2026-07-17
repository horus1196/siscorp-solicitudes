<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registro';
    protected $primaryKey = 'registro_id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'registro_id',
        'registro_oficio',
        'registro_oficio_fecha',
        'registro_nombre',
        'registro_apellido_paterno',
        'registro_apellido_materno',
        'registro_email',
        'registro_estatus'
    ];

    protected $casts = [
        'registro_oficio_fecha' => 'date',
        'registro_creacion' => 'datetime',
    ];

    const ESTATUS_ACTIVO = 'A';
    const ESTATUS_BAJA = 'B';

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'registro_id', 'registro_id');
    }

    public function getNombreCompletoAttribute()
    {
        return trim("{$this->registro_nombre} {$this->registro_apellido_paterno} {$this->registro_apellido_materno}");
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }
}