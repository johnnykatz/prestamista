<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Prestamo;
use Carbon\Carbon;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PrestamoRepository
 * @package App\Repositories\Admin
 * @version June 4, 2018, 6:18 pm UTC
 *
 * @method Prestamo findWithoutFail($id, $columns = ['*'])
 * @method Prestamo find($id, $columns = ['*'])
 * @method Prestamo first($columns = ['*'])
 */
class PrestamoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'monto',
        'cuotas',
        'interes',
        'descuento',
        'fecha_inicio',
        'observacion',
        'cliente_id',
        'amortizacion_id',
        'modalidad_pago_id',
        'estado_prestamo_id',
        'creado_por'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Prestamo::class;
    }

    public function getPrestamosFilter($params)
    {
        $prestamos = Prestamo::from('prestamos as p')
            ->join('clientes as c', 'c.id', '=', 'p.cliente_id');

        if ($params['comodin'] != '') {
            $prestamos->where(function ($query) {
                $query->orWhere('c.nombre', 'LIKE', "%" . $_REQUEST['comodin'] . "%")
                    ->orWhere('c.apellido', 'LIKE', "%" . $_REQUEST['comodin'] . "%");
            }
            );
        }
        $prestamos->orderBy('p.estado_prestamo_id', 'ASC')->orderBy('p.id', 'DESC')->select('p.*');
        return $prestamos->paginate(10);

    }

    public function getAmortizacion($params)
    {
        $datos = array();
        $result = array();
        $capital_restante = $params['monto'];
        $capital_cuota = $params['monto'] / $params['cuotas'];
        $interes = ($params['monto'] * $params['interes']) / 100;
        $fecha_vencimiento = Carbon::createFromFormat('d-m-Y', $params['fecha_primer_pago'])->toDateString();
        for ($i = 1; $i <= $params['cuotas']; $i++) {
            $datos['cuota'] = $i;
            $datos['capital_restante'] = $capital_restante;
            $datos['capital_cuota'] = $capital_cuota;
            $datos['interes'] = $interes;
            $datos['total_pago'] = $capital_cuota + $interes;
            $datos['fecha_vencimiento'] = $fecha_vencimiento;
            $capital_restante -= $capital_cuota;
            $result[] = $datos;
            $datos = array();
            $fecha_vencimiento = $this->getVencimiento($fecha_vencimiento, $params['modalidad_pago_id']);
        }
        return $result;
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
