<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tax
 * @package App\Models
 */
class Tax extends Model
{
    use SoftDeletes;

    public $table = 'taxes';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'value',
        'is_active',

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'value' => 'decimal',
        'is_active' => 'boolean',

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules()
    {
        return [

        ];
    }

    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'products_taxes_pivot', 'tax_id', 'product_id')->withTimestamps();
    }

    public function services()
    {
        return $this->belongsToMany('App\Service', 'services_taxes_pivot', 'tax_id', 'service_id')->withTimestamps();
    }

}
