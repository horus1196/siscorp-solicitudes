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

    public function descargarSolicitud(){

        return view("solicitud/solicitud-pdf");

    }
}
