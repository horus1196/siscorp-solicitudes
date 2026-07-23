<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Control;
use Exception;

class ControlController extends Controller
{
    public function activeRecords(): JsonResponse
    {
        try {

            $activeRecords = Control::controlTransporte();

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
                "message" => "Error al tratar de obtener el control vehicular",
                "data" => null
            ], 200);
        }
    }
}
