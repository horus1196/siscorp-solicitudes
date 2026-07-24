<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use App\Models\Solicitud;
use App\Models\Registro;
use App\Models\Convenio;
use App\Models\Solicitante;
use App\Models\ControlSolicitante;
use App\Models\AutorizacionSolicitante;
use App\Models\Control;
use Barryvdh\DomPDF\Facade\Pdf;

class SolicitudController extends Controller
{

    public function index()
    {

        return view(
            "solicitud.index"
        );
    }

    public function generarSolicitud(Request $request): JsonResponse
    {

        try {

            $solicitud_validacion = Solicitud::validarSolicitud($request);

            if (
                $solicitud_validacion["error"] == 1
            ) {

                return response()->json($solicitud_validacion, 200);
            }

            //$registro_id = Registro::max('registro_id') + 1;

            //$solicitud_validacion["data"]["registro"]["registro_id"] = $registro_id;

            $resultado = DB::transaction(function () use ($solicitud_validacion) {

                $createRegistro = Registro::create(
                    $solicitud_validacion["data"]["registro"]
                );

                $registro_id = $createRegistro->registro_id;

                $convenio_id = null;

                if (
                    !empty($solicitud_validacion["data"]["convenio"]["convenio_dependencia"])
                ) {

                    /*$convenio_id = Convenio::max('convenio_id') + 1;

                $solicitud_validacion["data"]["convenio"]["convenio_id"] = $convenio_id;*/

                    $createConvenio = Convenio::create(
                        $solicitud_validacion["data"]["convenio"]
                    );

                    $convenio_id = $createConvenio->convenio_id;
                }

                /*$solicitante_id = Solicitante::max('solicitante_id') + 1;

                $solicitud_validacion["data"]["solicitante"]["solicitante_id"] = $solicitante_id;*/

                $solicitud_validacion["data"]["solicitante"]["convenio_id"] = $convenio_id;

                $createSolicitante = Solicitante::create(
                    $solicitud_validacion["data"]["solicitante"]
                );

                $solicitante_id = $createSolicitante->solicitante_id;

                for (
                    $i = 0;
                    $i < count($solicitud_validacion["data"]["control"]);
                    $i++
                ) {

                    ControlSolicitante::create([
                        //"control_solicitante_id" => ControlSolicitante::max("control_solicitante_id") + 1,
                        "control_id" => $solicitud_validacion["data"]["control"][$i],
                        "solicitante_id" => $solicitante_id
                    ]);
                }

                for (
                    $j = 0;
                    $j < count($solicitud_validacion["data"]["autorizacion"]);
                    $j++
                ) {

                    AutorizacionSolicitante::create([
                        "solicitante_id" => $solicitante_id,
                        "autorizacion_id" => $solicitud_validacion["data"]["autorizacion"][$j],
                    ]);
                }

                $solicitud_validacion["data"]["solicitud"]["solicitante_id"] = $solicitante_id;

                $solicitud_validacion["data"]["solicitud"]["registro_id"] = $registro_id;

                Solicitud::create(
                    $solicitud_validacion["data"]["solicitud"]
                );

                return $solicitud_validacion;
            });

            return response()->json($resultado, 200);
        } catch (\Exception $e) {

            \Log::error('Error al crear registro', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => 1,
                'message' => 'Error al crear el registro: ' . $e->getMessage(),
                'data' => null
            ], 200);
        }
    }

    public function descargarSolicitud(
        int $solicitud_id
    ) {

        try {

            ini_set('memory_limit', '2048M'); // 2 GB
            ini_set('max_execution_time', 300);

            $solicitante = Solicitante::getSolicitanteBySolicitudId($solicitud_id);

            if (
                count($solicitante) == 0
            ) {

                return response()->json([
                    "error" => 1,
                    "message" => "No hay datos del solictante para la solicitud $solicitud_id",
                    "data" => null,
                ], 200);
            }

            $controlSolicitante = ControlSolicitante::getControlSolicitanteBySolicitudId($solicitud_id);

            if (
                count($controlSolicitante) == 0
            ) {

                return response()->json([
                    "error" => 1,
                    "message" => "No hay controles vehiculares para la solicitud $solicitud_id",
                    "data" => null,
                ], 200);
            }


            $autorizacionSolicitante = AutorizacionSolicitante::getAutorizacionSolicitanteBySolicitudId($solicitud_id);

            if (
                count($autorizacionSolicitante) == 0
            ) {

                return response()->json([
                    "error" => 1,
                    "message" => "No hay autorizaciones para la solicitud $solicitud_id",
                    "data" => null,
                ], 200);
            }

            $solicitudData = [
                "solicitante" => $solicitante[0],
                "control_solicitante" => $controlSolicitante,
                "autorizacion_solicitante" => $autorizacionSolicitante
            ];

            $pdf = Pdf::loadView('solicitud.solicitudPDF', $solicitudData);

            return $pdf->stream('solicitud_' . $solicitud_id . '.pdf');
            
        } catch (\Exception $e) {

            \Log::error('Error en activeRecords: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                "error" => 1,
                "message" => "Error al tratar de obtener las datos de la solicitud no. {$solicitud_id}",
                "data" => null
            ], 200);
        }


        /*return view(
            "solicitud/solicitud-pdf",
            [
                "solicitud_id" => $solicitud_id
            ]
        );*/
    }
}
