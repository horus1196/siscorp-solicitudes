<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;
use Exception;

class Autorizacion extends Model
{
    protected $table = 'autorizacion';
    protected $primaryKey = 'autorizacion_id';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        //'autorizacion_id',
        'autorizacion_nombre',
        'registro_estatus'
    ];

    protected $casts = [
        'registro_creacion' => 'datetime',
    ];

    const ESTATUS_ACTIVO = 'A';
    const ESTATUS_BAJA = 'B';

    public function convenios()
    {
        return $this->belongsToMany(Convenio::class, 'autorizacion_convenio', 'autorizacion_id', 'convenio_id');
    }

    public function solicitantes()
    {
        return $this->belongsToMany(Solicitante::class, 'autorizacion_solicitante', 'autorizacion_id', 'solicitante_id');
    }

    public function unidadesAdministrativas()
    {
        return $this->belongsToMany(UnidadAdministrativa::class, 'autorizacion_unidad_administrativa', 'autorizacion_id', 'unidad_administrativa_id');
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }


    public static function getAutorizacionesPorUnidadAdministrativa(
        int $unidad_administrativa_id
    ) {
        try {

            $sql = "SELECT
                autorizacion_unidad_administrativa.autorizacion_id,
                autorizacion.autorizacion_nombre
                FROM
                autorizacion_unidad_administrativa
                INNER JOIN autorizacion ON autorizacion.autorizacion_id = autorizacion_unidad_administrativa.autorizacion_id
                WHERE
                autorizacion_unidad_administrativa.unidad_administrativa_id = :unidad_administrativa_id
                AND
                autorizacion_unidad_administrativa.registro_estatus = 'A'
                ORDER BY
                autorizacion_unidad_administrativa.autorizacion_id";

            $pdo = DB::connection()->getPdo();

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $pdo->prepare($sql);

            $statement->execute([
                ':unidad_administrativa_id' => $unidad_administrativa_id
            ]);

            $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);

            \Log::info('Consulta AutorizacionController ejecutada', [
                'total_registros' => count($resultados)
            ]);

            return $resultados;
        } catch (PDOException $e) {

            \Log::error('Error PDO en AutorizacionController', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'errorInfo' => $e->errorInfo ?? null
            ]);

            throw new Exception('Error en la consulta de autorizaciones activas: ' . $e->getMessage());
        } catch (Exception $e) {

            \Log::error('Error en AutorizacionController', [
                'message' => $e->getMessage()
            ]);

            throw $e;
        }
    }
}
