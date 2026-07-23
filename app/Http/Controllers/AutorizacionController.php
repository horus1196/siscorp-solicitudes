<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;
use Exception;
use Illuminate\Http\JsonResponse;

use App\Models\Autorizacion;

class AutorizacionController extends Controller
{
    public function autorizacionesPorUnidadAdministrativa(Request $request): JsonResponse
    {
        try {

            $unidad_administrativa_id = $request->input("unidad_administrativa_id");

            $activeRecords = Autorizacion::getAutorizacionesPorUnidadAdministrativa($unidad_administrativa_id);

            return response()->json([
                "error" => 0,
                "message" => "Registros obtenidos correctamente",
                "data" => $activeRecords,
            ], 200);
            
        } catch (\Exception $e) {

            \Log::error('Error en activeRecords: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                "error" => 1,
                "message" => "Error al tratar de obtener las autorizaciones de la unidad administrativa no. {$unidad_administrativa_id}",
                "data" => null
            ], 200);
        }
    }
}
