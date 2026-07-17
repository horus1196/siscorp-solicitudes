<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnidadAdministrativa;

class UnidadAdministrativaSeeder extends Seeder
{
    public function run(): void
    {
        $unidades = [
            [
                'unidad_administrativa_id' => 1,
                'unidad_administrativa_nombre' => 'DIRECCIÓN GENERAL DE REGISTRO PÚBLICO DEL TRANSPORTE',
                'unidad_administrativa_alias' => 'DGRPT',
            ],
            [
                'unidad_administrativa_id' => 2,
                'unidad_administrativa_nombre' => 'DIRECCIÓN GENERAL DE LICENCIAS Y OPERACIÓN DEL TRANSPORTE VEHICULAR',
                'unidad_administrativa_alias' => 'DGLOTV',
            ],
            [
                'unidad_administrativa_id' => 3,
                'unidad_administrativa_nombre' => 'DIRECCIÓN OPERATIVA DE TRANSPORTE PÚBLICO INDIVIDUAL',
                'unidad_administrativa_alias' => 'DOTPI',
            ],
            [
                'unidad_administrativa_id' => 4,
                'unidad_administrativa_nombre' => 'DIRECCIÓN DE TRANSPORTE DE CARGA Y ESPECIALIZADO',
                'unidad_administrativa_alias' => 'DTCE',
            ],
            [
                'unidad_administrativa_id' => 5,
                'unidad_administrativa_nombre' => 'DIRECCIÓN DE TRANSPORTE PARTICULAR',
                'unidad_administrativa_alias' => 'DTP',
            ],
            [
                'unidad_administrativa_id' => 6,
                'unidad_administrativa_nombre' => 'DIRECCIÓN DE OPERACIÓN Y LICENCIAS DE TRANSPORTE DE RUTA Y ESPECIALIZADO',
                'unidad_administrativa_alias' => 'DOLTRE',
            ],
        ];

        foreach ($unidades as $unidad) {
            UnidadAdministrativa::updateOrCreate(
                ['unidad_administrativa_id' => $unidad['unidad_administrativa_id']],
                [
                    'unidad_administrativa_nombre' => $unidad['unidad_administrativa_nombre'],
                    'unidad_administrativa_alias' => $unidad['unidad_administrativa_alias'],
                    'registro_estatus' => UnidadAdministrativa::ESTATUS_ACTIVO,
                ]
            );
        }
    }
}