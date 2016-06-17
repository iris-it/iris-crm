<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'product_name',
        'is_active',
        'category',
        'ht_price',
        'ttc_price',
        'manutention_officer',
        'stock_disponibility',
        'product_avatar',
        'sale_datestart',
        'sale_dateend',
        'product_notice',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_name' => 'string',
        'is_active' => 'boolean',
        'category' => 'string',
        'manutention_officer' => 'string',
        'stock_disponibility' => 'integer',
        'product_avatar' => 'string',
        'product_notice' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function taxes()
    {
        return $this->belongsToMany('App\Tax', 'products_taxes_pivot', 'product_id', 'tax_id')->withTimestamps();
    }

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
}
