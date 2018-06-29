<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Pago;
use Carbon\Carbon;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PagoRepository
 * @package App\Repositories\Admin
 * @version June 4, 2018, 6:31 pm UTC
 *
 * @method Pago findWithoutFail($id, $columns = ['*'])
 * @method Pago find($id, $columns = ['*'])
 * @method Pago first($columns = ['*'])
 */
class PagoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'capital',
        'total_pago',
        'interes',
        'descuento',
        'mora',
        'fecha',
        'estado',
        'forma_pago_id',
        'creado_por',
        'prestamo_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pago::class;
    }

    public function getDatosProximoPago($prestamo)
    {
        $pago = Pago::where('prestamo_id', $prestamo->id)->where('estado', false)->orderBy('numero_cuota', 'ASC')->limit(1)->first();
        return $pago;
    }
    public function getVencimiento($fecha_inicio, $modalidad)
    {
        $fecha = Carbon::createFromFormat('Y-m-d', $fecha_inicio);
        switch ($modalidad) {
            case 1://diario
                $fecha = $fecha->addDay();
                break;
            case 2://semanal
                $fecha = $fecha->addWeek();
                break;
            case 3://quincenal
                $fecha = $fecha->addDays(15);
                break;
            case 4://mensual
                $fecha = $fecha->addMonth();
                break;
            default:
                $fecha = null;
                break;
        }
        return $fecha->toDateString();
    }
}
