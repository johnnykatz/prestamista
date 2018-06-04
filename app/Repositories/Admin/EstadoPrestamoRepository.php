<?php

namespace App\Repositories\Admin;

use App\Models\Admin\EstadoPrestamo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EstadoPrestamoRepository
 * @package App\Repositories\Admin
 * @version June 4, 2018, 6:13 pm UTC
 *
 * @method EstadoPrestamo findWithoutFail($id, $columns = ['*'])
 * @method EstadoPrestamo find($id, $columns = ['*'])
 * @method EstadoPrestamo first($columns = ['*'])
*/
class EstadoPrestamoRepository extends BaseRepository
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
        return EstadoPrestamo::class;
    }
}
