<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cliente
 * @package App\Models\Admin
 * @version June 4, 2018, 6:08 pm UTC
 *
 * @property string apellido
 * @property string nombre
 * @property string dni
 * @property string direccion
 * @property string telefono
 * @property string telefono_otro
 * @property string observacion
 * @property string mail
 */
class Cliente extends Model
{
    use SoftDeletes;

    public $table = 'clientes';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'apellido',
        'nombre',
        'dni',
        'direccion',
        'telefono',
        'telefono_otro',
        'observacion',
        'mail',
        'creado_por',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'apellido' => 'string',
        'nombre' => 'string',
        'dni' => 'string',
        'direccion' => 'string',
        'telefono' => 'string',
        'telefono_otro' => 'string',
        'observacion' => 'string',
        'mail' => 'string',
        'creado_por' => 'integer'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function getFullNameAttribute()
    {
        return "{$this->apellido} {$this->nombre}";
    }

    public function prestamos()
    {
        return $this->hasMany('App\Models\Admin\Prestamo');
    }

    public function creadoPor()
    {
        return $this->belongsTo('App\Models\Admin\User', 'creado_por');
    }

}
