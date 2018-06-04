<?php

namespace App\Repositories\Admin;

use App\User;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories\Admin
 * @version March 6, 2018, 10:26 pm UTC
 *
 * @method User findWithoutFail($id, $columns = ['*'])
 * @method User find($id, $columns = ['*'])
 * @method User first($columns = ['*'])
*/
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'username',
        'password'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
