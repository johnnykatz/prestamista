<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Prestamo
 * @package App\Models\Admin
 * @version June 4, 2018, 6:18 pm UTC
 *
 * @property decimal monto
 * @property string cuotas
 * @property decimal interes
 * @property decimal descuento
 * @property dateTime fecha_inicio
 * @property string observacion
 * @property integer cliente_id
 * @property integer amortizacion_id
 * @property integer modalidad_pago_id
 * @property integer estado_prestamo_id
 * @property integer creado_por
 */
class Prestamo extends Model
{
    use SoftDeletes;

    public $table = 'prestamos';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'monto',
        'cuotas',
        'interes',
        'descuento',
        'fecha_inicio',
        'observacion',
        'cliente_id',
        'amortizacion_id',
        'modalidad_pago_id',
        'estado_prestamo_id',
        'creado_por',
        'monto_pendiente',
        'nombre_identificador',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cuotas' => 'string',
        'fecha_inicio' => 'datetime',
        'observacion' => 'string',
        'cliente_id' => 'integer',
        'amortizacion_id' => 'integer',
        'modalidad_pago_id' => 'integer',
        'estado_prestamo_id' => 'integer',
        'creado_por' => 'integer',
        'nombre_identificador' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Admin\Cliente');
    }

    public function creadoPor()
    {
        return $this->belongsTo('App\Models\Admin\User', 'creado_por');
    }

    public function amortizacion()
    {
        return $this->belongsTo('App\Models\Admin\Amortizacion');
    }

    public function modalidadPago()
    {
        return $this->belongsTo('App\Models\Admin\ModalidadPago');
    }

    public function estadoPrestamo()
    {
        return $this->belongsTo('App\Models\Admin\EstadoPrestamo');
    }

    public function pagos()
    {
        return $this->hasMany('App\Models\Admin\Pago');
    }
}
