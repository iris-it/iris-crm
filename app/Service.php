<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Service
 * @package App\Models
 */
class Service extends Model
{
    use SoftDeletes;

    public $table = 'services';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'service_name',
        'is_active',
        'category',
        'sale_unit',
        'ht_price',
        'ttc_price',
        'sale_datestart',
        'sale_dateend',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'service_name' => 'string',
        'is_active' => 'boolean',
        'category' => 'string',
        'sale_unit' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
