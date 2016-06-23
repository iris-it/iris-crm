<?php

namespace App;

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
    public function rules()
    {
        return [

            'service_name' => 'string|max:255|required',
            'is_active' => 'boolean',
            'category'=> 'string|max:255|required',
            'sale_unit'=> 'string|max:255|required',
            'ht_price' => 'decimal|required',
            'sale_datestart'=> 'required|date_format:d/m/Y',
            'sale_dateend' => 'required|date_format:d/m/Y',
            'description' => 'string',

            /*Relations*/

            'taxes.*' => ''
        ];
    }

    public function taxes()
    {
        return $this->belongsToMany('App\Tax', 'services_taxes_pivot', 'service_id', 'tax_id')->withTimestamps();
    }
}
