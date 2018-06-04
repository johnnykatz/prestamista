<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Cliente;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ClienteRepository
 * @package App\Repositories\Admin
 * @version June 4, 2018, 6:08 pm UTC
 *
 * @method Cliente findWithoutFail($id, $columns = ['*'])
 * @method Cliente find($id, $columns = ['*'])
 * @method Cliente first($columns = ['*'])
*/
class ClienteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'apellido',
        'nombre',
        'dni',
        'direccion',
        'telefono',
        'telefono_otro',
        'observacion',
        'mail'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cliente::class;
    }
}
