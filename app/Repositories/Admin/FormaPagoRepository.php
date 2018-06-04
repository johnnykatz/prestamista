<?php

namespace App\Repositories\Admin;

use App\Models\Admin\FormaPago;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FormaPagoRepository
 * @package App\Repositories\Admin
 * @version June 4, 2018, 6:18 pm UTC
 *
 * @method FormaPago findWithoutFail($id, $columns = ['*'])
 * @method FormaPago find($id, $columns = ['*'])
 * @method FormaPago first($columns = ['*'])
*/
class FormaPagoRepository extends BaseRepository
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
        return FormaPago::class;
    }
}
