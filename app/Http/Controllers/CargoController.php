<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cargo;

use Illuminate\Http\JsonResponse;

class CargoController extends Controller
{

    public function activeRecords(): JsonResponse
    {

        try {

            $activeRecords = Cargo::active()->orderBy('cargo_id')->get()->toArray();

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
                        "value" => $activeRecords[$i]["cargo_id"],
                        "text" => $activeRecords[$i]["cargo_nombre"]
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
                "message" => "Error al trata de obtener los cargos",
                "data" => null
            ], 200);
        }
    }
}
