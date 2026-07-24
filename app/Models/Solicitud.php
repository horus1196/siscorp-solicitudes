<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;
use Exception;
use ReturnTypeWillChange;
use App\Models\UnidadAdministrativa;
use App\Models\Autorizacion;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Solicitud extends Model
{
    protected $table = 'solicitud';
    protected $primaryKey = 'solicitud_id';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        //'solicitud_id',
        'solicitud_uuid',
        'solicitante_id',
        'registro_id',
        'solicitud_folio',
        'solicitud_mail_asunto',
        'solicitud_mail_cuerpo',
        'solicitud_mail_error',
        'solicitud_pdf_path',
        'registro_estatus'
    ];

    protected $casts = [
        'registro_creacion' => 'datetime',
    ];

    const ESTATUS_ACTIVO = 'A';
    const ESTATUS_BAJA = 'B';

    public function solicitante()
    {
        return $this->belongsTo(Solicitante::class, 'solicitante_id', 'solicitante_id');
    }

    public function registro()
    {
        return $this->belongsTo(Registro::class, 'registro_id', 'registro_id');
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }

    public static function validarSolicitud(Request $request)
    {
        try {

            $rules = [
                // Registro
                'registro.registro_oficio' => [
                    'required',
                    'string',
                    'max:255',
                    'regex:/^[0-9A-Za-záéíóúÁÉÍÓÚñÑ\/\-\(\)\.\,\;\s\:]+$/'
                ],

                'registro.registro_oficio_fecha' => [
                    'required',
                    'date_format:d/m/Y'
                ],

                'registro.registro_nombre' => [
                    'required',
                    'string',
                    'max:50',
                    'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s\.]+$/'
                ],

                'registro.registro_apellido_paterno' => [
                    'required',
                    'string',
                    'max:50',
                    'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s\.]+$/'
                ],

                'registro.registro_apellido_materno' => [
                    'nullable',
                    'string',
                    'max:50',
                    'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s\.]+$/'
                ],

                'registro.registro_email' => [
                    'required',
                    'email',
                    'max:255'
                ],

                // Solicitante
                'solicitante.solicitante_nombre' => [
                    'required',
                    'string',
                    'max:50',
                    'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s\.]+$/'
                ],

                'solicitante.solicitante_apellido_paterno' => [
                    'required',
                    'string',
                    'max:50',
                    'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s\.]+$/'
                ],

                'solicitante.solicitante_apellido_materno' => [
                    'nullable',
                    'string',
                    'max:50',
                    'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s\.]+$/'
                ],

                'solicitante.solicitante_curp' => [
                    'required',
                    'string',
                    'size:18',
                    'regex:/^[A-Z][AEIOUX][A-Z]{2}\d{2}(0[1-9]|1[0-2])(0[1-9]|[12]\d|3[01])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d]\d$/',
                ],

                'solicitante.solicitante_fecha' => [
                    'required',
                    'date_format:d/m/Y'
                ],

                'solicitante.unidad_administrativa_id' => [
                    'required',
                    'integer',
                    'exists:unidad_administrativa,unidad_administrativa_id'
                ],

                'solicitante.unidad_administrativa_cargo_id' => [
                    'nullable',
                    'integer',
                    'exists:cargo,cargo_id'
                ],

                'solicitante.solicitante_ip' => [
                    'required',
                    'ip'
                ],

                'solicitante.solicitante_telefono' => [
                    'required',
                    'string',
                    'size:10',
                    'regex:/^[0-9]+$/'
                ],

                'solicitante.solicitante_email' => [
                    'required',
                    'email',
                    'max:255'
                ],

                // Convenio
                'convenio.convenio_dependencia' => [
                    'nullable',
                    'string',
                    'max:300',
                    'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s\.\-\,\;\/\(\)]+$/'
                ],

                'convenio.convenio_puesto' => [
                    'nullable',
                    'string',
                    'max:255',
                    'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s\.\-\,\;\/\(\)]+$/'
                ],

                // Control
                'control' => [
                    'required',
                    'array',
                    'min:1'
                ],

                'control.*' => [
                    'integer',
                    'exists:control,control_id'
                ],

                // Autorización
                'autorizacion' => [
                    'required',
                    'array',
                    'min:1'
                ],

                'autorizacion.*' => [
                    'integer',
                    'exists:autorizacion,autorizacion_id'
                ],
            ];

            $messages = [
                // Registro
                'registro.registro_oficio.required' => 'Número de oficio obligatorio',
                'registro.registro_oficio.regex' => 'Caracteres no permitidos en el número de oficio',
                'registro.registro_oficio_fecha.required' => 'La fecha de oficio es obligatoria',
                'registro.registro_oficio_fecha.date_format' => 'La fecha debe tener formato DD/MM/YYYY',
                'registro.registro_nombre.required' => 'El nombre es obligatorio',
                'registro.registro_nombre.regex' => 'El nombre solo puede contener letras y espacios',
                'registro.registro_apellido_paterno.required' => 'El apellido paterno es obligatorio',
                'registro.registro_apellido_paterno.regex' => 'El apellido paterno solo puede contener letras y espacios',
                'registro.registro_apellido_materno.regex' => 'Caracteres no permitidos en el apellido materno de la persona que hace el registro',
                'registro.registro_email.required' => 'El correo electrónico es obligatorio',
                'registro.registro_email.email' => 'Ingresa un correo electrónico válido',

                // Solicitante
                'solicitante.solicitante_nombre.required' => 'El nombre del solicitante es obligatorio',
                'solicitante.solicitante_nombre.regex' => 'El nombre solo puede contener letras y espacios',
                'solicitante.solicitante_apellido_paterno.required' => 'El apellido paterno del solicitante es obligatorio',
                'solicitante.solicitante_apellido_paterno.regex' => 'El apellido paterno solo puede contener letras y espacios',
                'solicitante.solicitante_apellido_materno.regex' => 'Caracteres no permitidos en el apellido materno del solicitante',
                'solicitante.solicitante_curp.required' => 'La CURP es obligatoria',
                'solicitante.solicitante_curp.size' => 'La CURP debe tener exactamente 18 caracteres',
                'solicitante.solicitante_curp.regex' => 'Formato de CURP inválido',
                'solicitante.solicitante_fecha.required' => 'La fecha del solicitante es obligatoria',
                'solicitante.solicitante_fecha.date_format' => 'La fecha debe tener formato DD/MM/YYYY',
                'solicitante.unidad_administrativa_id.required' => 'La unidad administrativa es obligatoria',
                'solicitante.unidad_administrativa_id.exists' => 'La unidad administrativa seleccionada no existe',
                'solicitante.unidad_administrativa_cargo_id.exists' => 'El cargo seleccionado no existe',
                'solicitante.solicitante_ip.required' => 'La dirección IP es obligatoria',
                'solicitante.solicitante_ip.ip' => 'Ingresa una dirección IP válida',
                'solicitante.solicitante_telefono.required' => 'El teléfono es obligatorio',
                'solicitante.solicitante_telefono.size' => 'El teléfono debe tener 10 dígitos',
                'solicitante.solicitante_telefono.regex' => 'El teléfono solo debe contener números',
                'solicitante.solicitante_email.required' => 'El correo electrónico del solicitante es obligatorio',
                'solicitante.solicitante_email.email' => 'Ingresa un correo electrónico válido',

                // Convenio
                'convenio.convenio_dependencia.regex' => 'La dependencia contiene caracteres no permitidos',
                'convenio.convenio_puesto.regex' => 'El puesto contiene caracteres no permitidos',

                // Control
                'control.required' => 'Debes seleccionar al menos un control',
                'control.min' => 'Debes seleccionar al menos un control',
                'control.*.exists' => 'Uno de los controles seleccionados no existe',

                // Autorización
                'autorizacion.required' => 'Debes seleccionar al menos una autorización',
                'autorizacion.min' => 'Debes seleccionar al menos una autorización',
                'autorizacion.*.exists' => 'Una de las autorizaciones seleccionadas no existe',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {

                return [
                    "error" => 1,
                    "message" => "Error de validación",
                    "data" => $validator->errors()
                ];
            }

            $validated = $validator->validated();

            $registro = $validated['registro'] ?? [];
            $solicitante = $validated['solicitante'] ?? [];
            $convenio = $validated['convenio'] ?? [];
            $controles = $validated['control'] ?? [];
            $autorizaciones = $validated['autorizacion'] ?? [];

            $otrosConvenios = UnidadAdministrativa::select("unidad_administrativa_id")
                ->where("unidad_administrativa_nombre", "OTRO (CONVENIOS)")->get()->toArray();

            $autorizacionesUnidadAdministrativa = Autorizacion::getAutorizacionesPorUnidadAdministrativa($solicitante["unidad_administrativa_id"]);

            $autorizacionesId = [];

            for (
                $i = 0;
                $i < count($autorizacionesUnidadAdministrativa);
                $i++
            ) {

                $autorizacionesId[] = $autorizacionesUnidadAdministrativa[$i]["autorizacion_id"];
            }

            if (
                count($autorizaciones) > count($autorizacionesId)
            ) {

                return [
                    "error" => 1,
                    "message" => "Error de autorizaciones: el solicitante tiene más autorizaciones de las permitidas",
                    "data" => null
                ];
            }

            if (
                !empty(array_diff(
                    $autorizaciones,
                    $autorizacionesId
                ))
            ) {

                return [
                    "error" => 1,
                    "message" => "Error de autorizaciones: el solicitante tiene autorizaciones no permitidas",
                    "data" => null
                ];
            }


            if (
                $solicitante["unidad_administrativa_id"] == $otrosConvenios[0]["unidad_administrativa_id"]
            ) {

                if (
                    empty($convenio["convenio_dependencia"])
                ) {

                    return [
                        "error" => 1,
                        "message" => "Falta la dependencia del convenio",
                        "data" => null
                    ];
                }

                if (
                    empty($convenio["convenio_puesto"])
                ) {

                    return [
                        "error" => 1,
                        "message" => "Falta el puesto del convenio",
                        "data" => null
                    ];
                }

                if (
                    !empty($solicitante["unidad_administrativa_cargo_id"])
                ) {

                    return [
                        "error" => 1,
                        "message" => "El campo cargo solo está disponible para unidades administrativas de la ST-SEMOVI",
                        "data" => null
                    ];
                }
            }

            if (
                $solicitante["unidad_administrativa_id"] != $otrosConvenios[0]["unidad_administrativa_id"]
            ) {

                if (
                    !empty($convenio["convenio_dependencia"])
                ) {

                    return [
                        "error" => 1,
                        "message" => "La dependencia del convenio no aplica para unidades administrativas de la ST-SEMOVI",
                        "data" => null
                    ];
                }

                if (
                    !empty($convenio["convenio_puesto"])
                ) {

                    return [
                        "error" => 1,
                        "message" => "El puesto del convenio no aplica para unidades administrativas de la ST-SEMOVI",
                        "data" => null
                    ];
                }

                if (
                    empty($solicitante["unidad_administrativa_cargo_id"])
                ) {

                    return [
                        "error" => 1,
                        "message" => "Falta cargo del solicitante",
                        "data" => null
                    ];
                }
            }

            $registro["registro_oficio_fecha"] = Carbon::createFromFormat(
                'd/m/Y',
                $registro["registro_oficio_fecha"]
            )->format('Y-m-d');

            $solicitante["solicitante_fecha"] = Carbon::createFromFormat(
                'd/m/Y',
                $solicitante["solicitante_fecha"]
            )->format('Y-m-d');

            $fechaFolio = Carbon::now()->format('dmY');

            $solicitud_folio = $fechaFolio . $registro["registro_oficio"];

            $solicitud_folio_busqueda = Solicitud::where("solicitud_folio", $solicitud_folio)
                ->get()
                ->toArray();

            if (
                count($solicitud_folio_busqueda) > 0
            ) {

                return [
                    "error" => 1,
                    "message" => "El folio {$solicitud_folio} ya fue generado, usa otro número de oficio o intenta generar la solicitud otro día...",
                    "data" => null
                ];
            }

            return [
                "error" => 0,
                "message" => null,
                "data" => [
                    "registro" => $registro,
                    "solicitante" => $solicitante,
                    "convenio" => $convenio,
                    "control" => $controles,
                    "autorizacion" => $autorizaciones,
                    "solicitud" => [
                        "solicitud_folio" => $solicitud_folio,
                        "solicitud_mail_asunto" => "Layout solicitud usuarios SISCORP",
                        "solicitud_mail_cuerpo" => "Layout solicitud usuarios SISCORP<br>Usted generó exitosamente el siguiente Número de FOLIO: {$solicitud_folio}<br><b>Nota Informativa:</b> La generación de este folio y formato impreso constituye un registro de solicitud de trámite interno y no representa la activación inmediata de la cuenta ni una obligación definitiva de otorgamiento del servicio por parte de la dependencia emisora hasta cumplir con la validación correspondiente."
                    ]
                ]
            ];
        } catch (\Exception $e) {

            \Log::error('Error al procesar solicitud', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return [
                "error" => 1,
                "message" => "Error al procesar la solicitud: " . $e->getMessage(),
                "data" => null
            ];
        }
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->solicitud_uuid)) {
                $model->solicitud_uuid = (string) Str::uuid();
            }
        });
    }
}
