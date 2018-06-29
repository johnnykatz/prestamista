<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pago
 * @package App\Models\Admin
 * @version June 4, 2018, 6:31 pm UTC
 *
 * @property decimal capital
 * @property decimal total_pago
 * @property decimal interes
 * @property decimal descuento
 * @property decimal mora
 * @property string|\Carbon\Carbon fecha
 * @property boolean estado
 * @property integer forma_pago_id
 * @property integer creado_por
 * @property integer prestamo_id
 */
class Pago extends Model
{
    use SoftDeletes;

    public $table = 'pagos';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'capital',
        'total_pago',
        'interes',
        'descuento',
        'mora',
        'fecha',
        'estado',
        'forma_pago_id',
        'creado_por',
        'prestamo_id',
        'numero_cuota',
        'fecha_vencimiento',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'estado' => 'boolean',
        'forma_pago_id' => 'integer',
        'creado_por' => 'integer',
        'prestamo_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function creadoPor()
    {
        return $this->belongsTo('App\Models\Admin\User', 'creado_por');
    }

    public function formaPago()
    {
        return $this->belongsTo('App\Models\Admin\FormaPago');
    }

    public function prestamo()
    {
        return $this->belongsTo('App\Models\Admin\Prestamo');
    }


}
