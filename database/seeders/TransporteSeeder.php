<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transporte;

class TransporteSeeder extends Seeder
{
    public function run(): void
    {
        $transportes = [
            ['transporte_id' => 1, 'transporte_nombre' => 'PARTICULAR'],
            ['transporte_id' => 2, 'transporte_nombre' => 'CARGA'],
            ['transporte_id' => 3, 'transporte_nombre' => 'DEMOSTRADORA'],
            ['transporte_id' => 4, 'transporte_nombre' => 'RUTA'],
            ['transporte_id' => 5, 'transporte_nombre' => 'TAXI'],
        ];

        foreach ($transportes as $transporte) {
            Transporte::updateOrCreate(
                ['transporte_id' => $transporte['transporte_id']],
                [
                    'transporte_nombre' => $transporte['transporte_nombre'],
                    'registro_estatus' => Transporte::ESTATUS_ACTIVO,
                ]
            );
        }
    }
}