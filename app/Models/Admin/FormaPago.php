<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FormaPago
 * @package App\Models\Admin
 * @version June 4, 2018, 6:18 pm UTC
 *
 * @property string nombre
 */
class FormaPago extends Model
{
    use SoftDeletes;

    public $table = 'formas_pagos';
    

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

    public function pagos()
    {
        return $this->hasMany('App\Models\Admin\Pago');
    }

    
}
