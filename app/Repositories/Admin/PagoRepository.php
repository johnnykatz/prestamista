<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Pago;
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
}
