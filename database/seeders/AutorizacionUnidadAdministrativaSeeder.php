<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AutorizacionUnidadAdministrativa;

class AutorizacionUnidadAdministrativaSeeder extends Seeder
{
    public function run(): void
    {
        // Definir las autorizaciones por unidad administrativa según el SQL
        $relaciones = [
            // DGRPT (unidad_administrativa_id = 1) - Todas las autorizaciones (1-23)
            ...array_map(fn($id) => ['unidad_administrativa_id' => 1, 'autorizacion_id' => $id], range(1, 23)),

            // DGLOTV (unidad_administrativa_id = 2) - Autorizaciones: 1,2,3,4,8
            ['unidad_administrativa_id' => 2, 'autorizacion_id' => 1],
            ['unidad_administrativa_id' => 2, 'autorizacion_id' => 2],
            ['unidad_administrativa_id' => 2, 'autorizacion_id' => 3],
            ['unidad_administrativa_id' => 2, 'autorizacion_id' => 4],
            ['unidad_administrativa_id' => 2, 'autorizacion_id' => 8],

            // DOTPI (unidad_administrativa_id = 3) - Autorizaciones: 1,2,3,4,8
            ['unidad_administrativa_id' => 3, 'autorizacion_id' => 1],
            ['unidad_administrativa_id' => 3, 'autorizacion_id' => 2],
            ['unidad_administrativa_id' => 3, 'autorizacion_id' => 3],
            ['unidad_administrativa_id' => 3, 'autorizacion_id' => 4],
            ['unidad_administrativa_id' => 3, 'autorizacion_id' => 8],

            // DTCE (unidad_administrativa_id = 4) - Autorizaciones: 1,2,3,4,8
            ['unidad_administrativa_id' => 4, 'autorizacion_id' => 1],
            ['unidad_administrativa_id' => 4, 'autorizacion_id' => 2],
            ['unidad_administrativa_id' => 4, 'autorizacion_id' => 3],
            ['unidad_administrativa_id' => 4, 'autorizacion_id' => 4],
            ['unidad_administrativa_id' => 4, 'autorizacion_id' => 8],

            // DTP (unidad_administrativa_id = 5) - Autorizaciones: 1,2,3,4,8
            ['unidad_administrativa_id' => 5, 'autorizacion_id' => 1],
            ['unidad_administrativa_id' => 5, 'autorizacion_id' => 2],
            ['unidad_administrativa_id' => 5, 'autorizacion_id' => 3],
            ['unidad_administrativa_id' => 5, 'autorizacion_id' => 4],
            ['unidad_administrativa_id' => 5, 'autorizacion_id' => 8],

            // DOLTRE (unidad_administrativa_id = 6) - Autorizaciones: 1,2,3,4,8
            ['unidad_administrativa_id' => 6, 'autorizacion_id' => 1],
            ['unidad_administrativa_id' => 6, 'autorizacion_id' => 2],
            ['unidad_administrativa_id' => 6, 'autorizacion_id' => 3],
            ['unidad_administrativa_id' => 6, 'autorizacion_id' => 4],
            ['unidad_administrativa_id' => 6, 'autorizacion_id' => 8],


            // OTRO (CONVENIOS) (unidad_administrativa_id = 7) - Autorizaciones: 1,8
            ['unidad_administrativa_id' => 7, 'autorizacion_id' => 1],
            ['unidad_administrativa_id' => 7, 'autorizacion_id' => 8],

        ];

        $counter = 1;
        foreach ($relaciones as $relacion) {
            AutorizacionUnidadAdministrativa::updateOrCreate(
                [
                    'autorizacion_unidad_administrativa_id' => $counter,
                ],
                [
                    'unidad_administrativa_id' => $relacion['unidad_administrativa_id'],
                    'autorizacion_id' => $relacion['autorizacion_id'],
                    'registro_estatus' => 'A',
                ]
            );
            $counter++;
        }
    }
}
