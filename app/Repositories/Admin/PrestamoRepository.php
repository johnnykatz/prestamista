<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Prestamo;
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
}
