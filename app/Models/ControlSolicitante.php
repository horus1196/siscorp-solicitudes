<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;
use Exception;

class ControlSolicitante extends Model
{
    protected $table = 'control_solicitante';
    protected $primaryKey = 'control_solicitante_id';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        //'control_solicitante_id',
        'control_id',
        'solicitante_id',
        'registro_estatus'
    ];

    protected $casts = [
        'registro_creacion' => 'datetime',
    ];

    const ESTATUS_ACTIVO = 'A';
    const ESTATUS_BAJA = 'B';

    public function control()
    {
        return $this->belongsTo(Control::class, 'control_id', 'control_id');
    }

    public function solicitante()
    {
        return $this->belongsTo(Solicitante::class, 'solicitante_id', 'solicitante_id');
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }

    public static function getControlSolicitanteBySolicitudId(
        int $solicitud_id
    ) {
        try {

            $sql = "SELECT
                transporte.transporte_nombre,
                control.control_nombre,
                IF(ISNULL(control_check.control_id), 0, 1) AS control_check
                FROM
                control
                INNER JOIN transporte ON transporte.transporte_id = control.transporte_id
                LEFT JOIN (SELECT
                control_id
                FROM
                control_solicitante
                WHERE
                control_solicitante.registro_estatus = 'A'
                AND
                control_solicitante.solicitante_id IN (SELECT
                solicitud.solicitante_id
                FROM
                solicitud
                WHERE
                solicitud.solicitud_id = :solicitud_id)) AS control_check ON control_check.control_id = control.control_id
                WHERE
                control.registro_estatus = 'A'
                ORDER BY
                control.control_id";

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
