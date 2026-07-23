<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;
use Exception;

class Control extends Model
{

    protected $table = 'control';
    protected $primaryKey = 'control_id';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        //'control_id',
        'transporte_id',
        'control_nombre',
        'registro_estatus'
    ];

    protected $casts = [
        'registro_creacion' => 'datetime',
    ];

    const ESTATUS_ACTIVO = 'A';
    const ESTATUS_BAJA = 'B';

    public function transporte()
    {
        return $this->belongsTo(Transporte::class, 'transporte_id', 'transporte_id');
    }

    public function controlSolicitantes()
    {
        return $this->hasMany(ControlSolicitante::class, 'control_id', 'control_id');
    }

    public function scopeActive($query)
    {
        return $query->where('registro_estatus', self::ESTATUS_ACTIVO);
    }

    /**
     * Obtener controles activos con su transporte
     * 
     * @return array
     * @throws Exception
     */
    public static function controlTransporte()
    {
        try {
            $sql = "SELECT 
                control.control_id,
                transporte.transporte_nombre,
                control.control_nombre
            FROM 
                control
            INNER JOIN transporte ON transporte.transporte_id = control.transporte_id
            WHERE 
                control.registro_estatus = 'A'
            ORDER BY 
                transporte.transporte_id,
                control.control_id";

            $pdo = DB::connection()->getPdo();

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $pdo->query($sql);

            $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);

            \Log::info('Consulta controlTransporte ejecutada', [
                'total_registros' => count($resultados)
            ]);

            return $resultados;
        } catch (PDOException $e) {

            \Log::error('Error PDO en controlTransporte', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'errorInfo' => $e->errorInfo ?? null
            ]);

            throw new Exception('Error en la consulta de controles activos: ' . $e->getMessage());
        } catch (Exception $e) {

            \Log::error('Error en controlTransporte', [
                'message' => $e->getMessage()
            ]);

            throw $e;
        }
    }
}
