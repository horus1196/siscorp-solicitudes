<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargo';
    protected $primaryKey = 'cargo_id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'cargo_id',
        'cargo_nombre',
        'registro_estatus'
    ];

    protected $casts = [
        'registro_creacion' => 'datetime',
    ];

    const ESTATUS_ACTIVO = 'A';
    const ESTATUS_BAJA = 'B';

    public function solicitantes()
    {
        return $this->hasMany(Solicitante::class, 'unidad_administrativa_cargo_id', 'cargo_id');
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }
}