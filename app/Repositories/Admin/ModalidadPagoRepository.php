<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ModalidadPago;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ModalidadPagoRepository
 * @package App\Repositories\Admin
 * @version June 4, 2018, 6:09 pm UTC
 *
 * @method ModalidadPago findWithoutFail($id, $columns = ['*'])
 * @method ModalidadPago find($id, $columns = ['*'])
 * @method ModalidadPago first($columns = ['*'])
*/
class ModalidadPagoRepository extends BaseRepository
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
        return ModalidadPago::class;
    }
}
