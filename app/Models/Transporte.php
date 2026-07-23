<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    protected $table = 'transporte';
    protected $primaryKey = 'transporte_id';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        //'transporte_id',
        'transporte_nombre',
        'registro_estatus'
    ];

    protected $casts = [
        'registro_creacion' => 'datetime',
    ];

    const ESTATUS_ACTIVO = 'A';
    const ESTATUS_BAJA = 'B';

    public function controls()
    {
        return $this->hasMany(Control::class, 'transporte_id', 'transporte_id');
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }
}