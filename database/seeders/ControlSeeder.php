<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Control;

class ControlSeeder extends Seeder
{
    public function run(): void
    {
        $controls = [
            ['control_id' => 1, 'transporte_id' => 1, 'control_nombre' => 'GRIS'],
            ['control_id' => 2, 'transporte_id' => 1, 'control_nombre' => 'VERDE'],
            ['control_id' => 3, 'transporte_id' => 1, 'control_nombre' => 'ANTIGUO'],
            ['control_id' => 4, 'transporte_id' => 1, 'control_nombre' => 'REMOLQUE'],
            ['control_id' => 5, 'transporte_id' => 1, 'control_nombre' => 'DISCAPACIDAD'],
            ['control_id' => 6, 'transporte_id' => 1, 'control_nombre' => 'MOTO GRIS'],
            ['control_id' => 7, 'transporte_id' => 1, 'control_nombre' => 'MOTO ECOLOGICA'],
            ['control_id' => 8, 'transporte_id' => 2, 'control_nombre' => 'CARGA (INCLUYE ESCOLTA)'],
            ['control_id' => 9, 'transporte_id' => 3, 'control_nombre' => 'DEMOSTRADORA'],
            ['control_id' => 10, 'transporte_id' => 4, 'control_nombre' => 'RUTA'],
            ['control_id' => 11, 'transporte_id' => 5, 'control_nombre' => 'TAXI'],
        ];

        foreach ($controls as $control) {
            Control::updateOrCreate(
                ['control_id' => $control['control_id']],
                [
                    'transporte_id' => $control['transporte_id'],
                    'control_nombre' => $control['control_nombre'],
                    'registro_estatus' => Control::ESTATUS_ACTIVO,
                ]
            );
        }
    }
}