<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EstadoPrestamo
 * @package App\Models\Admin
 * @version June 4, 2018, 6:13 pm UTC
 *
 * @property string nombre
 */
class EstadoPrestamo extends Model
{
    use SoftDeletes;

    public $table = 'estados_prestamos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function prestamos()
    {
        return $this->hasMany('App\Models\Admin\Prestamo');
    }

    
}
