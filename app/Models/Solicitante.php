<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;
use Exception;

class Solicitante extends Model
{
    protected $table = 'solicitante';
    protected $primaryKey = 'solicitante_id';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        //'solicitante_id',
        'solicitante_nombre',
        'solicitante_apellido_paterno',
        'solicitante_apellido_materno',
        'solicitante_curp',
        'solicitante_fecha',
        'solicitante_ip',
        'unidad_administrativa_id',
        'unidad_administrativa_cargo_id',
        'convenio_id',
        'solicitante_telefono',
        'solicitante_email',
        'registro_estatus'
    ];

    protected $casts = [
        'registro_creacion' => 'datetime',
    ];

    const ESTATUS_ACTIVO = 'A';
    const ESTATUS_BAJA = 'B';

    public function unidadAdministrativa()
    {
        return $this->belongsTo(UnidadAdministrativa::class, 'unidad_administrativa_id', 'unidad_administrativa_id');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'unidad_administrativa_cargo_id', 'cargo_id');
    }

    public function convenio()
    {
        return $this->belongsTo(Convenio::class, 'convenio_id', 'convenio_id');
    }

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'solicitante_id', 'solicitante_id');
    }

    public function autorizaciones()
    {
        return $this->belongsToMany(Autorizacion::class, 'autorizacion_solicitante', 'solicitante_id', 'autorizacion_id');
    }

    public function controls()
    {
        return $this->belongsToMany(Control::class, 'control_solicitante', 'solicitante_id', 'control_id');
    }

    public function getNombreCompletoAttribute()
    {
        return trim("{$this->solicitante_nombre} {$this->solicitante_apellido_paterno} {$this->solicitante_apellido_materno}");
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }

    public static function getSolicitanteBySolicitudId(
        int $solicitud_id
    ) {
        try {

            $sql = "SELECT
                solicitante.solicitante_nombre,
                solicitante.solicitante_apellido_paterno,
                solicitante.solicitante_apellido_materno,
                solicitante.solicitante_curp,
                DATE_FORMAT(solicitante.solicitante_fecha,'%d/%m/%Y') AS solicitante_fecha,
                unidad_administrativa.unidad_administrativa_nombre,
                cargo.cargo_nombre,
                convenio.convenio_dependencia,
                convenio.convenio_puesto,
                solicitante.solicitante_ip,
                solicitante.solicitante_telefono,
                solicitante.solicitante_email
                FROM
                solicitante
                INNER JOIN unidad_administrativa ON unidad_administrativa.unidad_administrativa_id = solicitante.unidad_administrativa_id
                LEFT JOIN convenio ON convenio.convenio_id = solicitante.convenio_id
                LEFT JOIN cargo ON cargo.cargo_id = solicitante.unidad_administrativa_cargo_id
                WHERE
                solicitante.registro_estatus = 'A'
                AND
                solicitante.solicitante_id IN (SELECT
                solicitud.solicitante_id
                FROM
                solicitud
                WHERE
                solicitud.solicitud_id = :solicitud_id)";

            $pdo = DB::connection()->getPdo();

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $pdo->prepare($sql);

            $statement->execute([
                ':solicitud_id' => $solicitud_id
            ]);

            $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);

            \Log::info('Consulta SolicitanteController ejecutada', [
                'total_registros' => count($resultados)
            ]);

            return $resultados;
        } catch (PDOException $e) {

            \Log::error('Error PDO en SolicitanteController', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'errorInfo' => $e->errorInfo ?? null
            ]);

            throw new Exception('Error en la consulta de datos del solicitante: ' . $e->getMessage());
        } catch (Exception $e) {

            \Log::error('Error en SolicitanteController', [
                'message' => $e->getMessage()
            ]);

            throw $e;
        }
    }
}
