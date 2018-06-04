<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Amortizacion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AmortizacionRepository
 * @package App\Repositories\Admin
 * @version June 4, 2018, 6:09 pm UTC
 *
 * @method Amortizacion findWithoutFail($id, $columns = ['*'])
 * @method Amortizacion find($id, $columns = ['*'])
 * @method Amortizacion first($columns = ['*'])
*/
class AmortizacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Amortizacion::class;
    }
}
