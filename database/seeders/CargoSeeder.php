<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cargo;

class CargoSeeder extends Seeder
{
    public function run(): void
    {
        $cargos = [
            ['cargo_id' => 1, 'cargo_nombre' => 'DIRECTOR'],
            ['cargo_id' => 2, 'cargo_nombre' => 'SUBDIRECTOR'],
            ['cargo_id' => 3, 'cargo_nombre' => 'JUD'],
            ['cargo_id' => 4, 'cargo_nombre' => 'EXTERNO'],
        ];

        foreach ($cargos as $cargo) {
            Cargo::updateOrCreate(
                ['cargo_id' => $cargo['cargo_id']],
                [
                    'cargo_nombre' => $cargo['cargo_nombre'],
                    'registro_estatus' => Cargo::ESTATUS_ACTIVO,
                ]
            );
        }
    }
}