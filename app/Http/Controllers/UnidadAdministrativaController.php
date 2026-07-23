<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UnidadAdministrativa;

use Illuminate\Http\JsonResponse;

class UnidadAdministrativaController extends Controller
{
    public function activeRecords(): JsonResponse
    {

        try {

            $activeRecords = UnidadAdministrativa::active()->orderBy('unidad_administrativa_id')->get()->toArray();

            $activeRecordsSelect = [];

            if(
                !empty($activeRecords)
            ){

                for(
                    $i = 0;
                    $i < count($activeRecords);
                    $i++
                ){

                    $activeRecordsSelect[] = [
                        "value" => $activeRecords[$i]["unidad_administrativa_id"],
                        "text" => $activeRecords[$i]["unidad_administrativa_nombre"]
                    ];

                }

            }

            return response()->json([
                "error" => 0,
                "message" => null,
                "data" => $activeRecordsSelect
            ], 200);

        } catch (\Exception $e) {

            \Log::error('Error en activeRecords: ' . $e->getMessage());

            return response()->json([
                "error" => 1,
                "message" => "Error al trata de obtener las unidades administrativas de la SEMOVI CDMX - Subsecretaría de Transporte",
                "data" => null
            ], 200);
        }
    }
}
