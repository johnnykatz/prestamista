<?php

namespace App\Repositories\Admin;

use App\Permission;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PermissionRepository
 * @package App\Repositories\Admin
 * @version March 3, 2018, 4:43 pm UTC
 *
 * @method Permission findWithoutFail($id, $columns = ['*'])
 * @method Permission find($id, $columns = ['*'])
 * @method Permission first($columns = ['*'])
*/
class PermissionRepository extends BaseRepository
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
        return Permission::class;
    }
}
