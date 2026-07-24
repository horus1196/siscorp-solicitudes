<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;
use Exception;

class AutorizacionSolicitante extends Model
{
    protected $table = 'autorizacion_solicitante';
    protected $primaryKey = 'autorizacion_solicitante_id';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        //'autorizacion_solicitante_id',
        'solicitante_id',
        'autorizacion_id',
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

    public function autorizacion()
    {
        return $this->belongsTo(Autorizacion::class, 'autorizacion_id', 'autorizacion_id');
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }

    public static function getAutorizacionSolicitanteBySolicitudId(
        int $solicitud_id
    ) {
        try {

            $sql = "SELECT
                autorizacion.autorizacion_nombre,
                IF(ISNULL(autorizacion_check.autorizacion_id) = 1, 0, 1) AS autorizacion_check
                FROM
                autorizacion
                LEFT JOIN (SELECT
                autorizacion_solicitante.autorizacion_id
                FROM
                autorizacion_solicitante
                WHERE
                autorizacion_solicitante.registro_estatus = 'A'
                AND
                autorizacion_solicitante.solicitante_id IN (SELECT
                solicitud.solicitante_id
                FROM
                solicitud
                WHERE
                solicitud.solicitud_id = :solicitud_id)) AS autorizacion_check ON autorizacion_check.autorizacion_id = autorizacion.autorizacion_id
                WHERE
                autorizacion.registro_estatus = 'A'
                ORDER BY
                autorizacion.autorizacion_id";

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
