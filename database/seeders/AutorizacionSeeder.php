<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Autorizacion;

class AutorizacionSeeder extends Seeder
{
    public function run(): void
    {
        $autorizaciones = [
            ['autorizacion_id' => 1, 'autorizacion_nombre' => 'SÁBANAS VEHICULARES'],
            ['autorizacion_id' => 2, 'autorizacion_nombre' => 'HISTORIAL DE MOVIMIENTOS VEHÍCULOS'],
            ['autorizacion_id' => 3, 'autorizacion_nombre' => 'ADEUDOS VEHÍCULOS'],
            ['autorizacion_id' => 4, 'autorizacion_nombre' => 'VERIFICAR LÍNEA DE CAPTURA'],
            ['autorizacion_id' => 5, 'autorizacion_nombre' => 'CONSULTA CANDADOS VEHICULARES'],
            ['autorizacion_id' => 6, 'autorizacion_nombre' => 'ACTIVAR CANDADOS VEHICULARES'],
            ['autorizacion_id' => 7, 'autorizacion_nombre' => 'DESACTIVAR CANDADOS VEHICULARES'],
            ['autorizacion_id' => 8, 'autorizacion_nombre' => 'CONSULTA DE SÁBANA DE LICENCIAS'],
            ['autorizacion_id' => 9, 'autorizacion_nombre' => 'ACTIVAR CANDADOS DE LICENCIAS'],
            ['autorizacion_id' => 10, 'autorizacion_nombre' => 'DESACTIVAR CANDADOS DE LICENCIAS'],
            ['autorizacion_id' => 11, 'autorizacion_nombre' => 'REVISIÓN EXPEDIENTES DIGITALES'],
            ['autorizacion_id' => 12, 'autorizacion_nombre' => 'BAJA ADMINISTRATIVA'],
            ['autorizacion_id' => 13, 'autorizacion_nombre' => 'TRÁMITE CORRECCIONES PARTICULAR'],
            ['autorizacion_id' => 14, 'autorizacion_nombre' => 'TRÁMITE CORRECCIONES RUTA'],
            ['autorizacion_id' => 15, 'autorizacion_nombre' => 'TRÁMITE CORRECCIONES TAXI'],
            ['autorizacion_id' => 16, 'autorizacion_nombre' => 'RESUMEN SOLICITUDES CORRECCIONES'],
            ['autorizacion_id' => 17, 'autorizacion_nombre' => 'VALIDAR CORRECCIONES'],
            ['autorizacion_id' => 18, 'autorizacion_nombre' => 'CONSULTA BAJA TAXI'],
            ['autorizacion_id' => 19, 'autorizacion_nombre' => 'CAMBIO DE ESTATUS'],
            ['autorizacion_id' => 20, 'autorizacion_nombre' => 'VALIDAR ESTATUS'],
            ['autorizacion_id' => 21, 'autorizacion_nombre' => 'SINCRONIZAR TRÁMITE SAF-ADIP'],
            ['autorizacion_id' => 22, 'autorizacion_nombre' => 'VISOR LICENCIAS B'],
            ['autorizacion_id' => 23, 'autorizacion_nombre' => 'REVISTAS'],
        ];

        foreach ($autorizaciones as $autorizacion) {
            Autorizacion::updateOrCreate(
                ['autorizacion_id' => $autorizacion['autorizacion_id']],
                [
                    'autorizacion_nombre' => $autorizacion['autorizacion_nombre'],
                    'registro_estatus' => Autorizacion::ESTATUS_ACTIVO,
                ]
            );
        }
    }
}