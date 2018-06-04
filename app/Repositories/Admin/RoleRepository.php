<?php

namespace App\Repositories\Admin;

use App\Role;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoleRepository
 * @package App\Repositories\Admin
 * @version March 5, 2018, 6:52 pm UTC
 *
 * @method Role findWithoutFail($id, $columns = ['*'])
 * @method Role find($id, $columns = ['*'])
 * @method Role first($columns = ['*'])
*/
class RoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'display_name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Role::class;
    }
}
