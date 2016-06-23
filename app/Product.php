<?php

namespace App;

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
    public function rules()
    {
        return [

            'product_name' => 'string|max:255|required',
            'is_active' => 'boolean',
            'category' => 'string|max:255|required',
            'ht_price' => 'decimal|required',
            'stock_disponibility' => 'integer|required',
            'product_avatar' => 'string',
            'sale_datestart' => 'required|date_format:d/m/Y',
            'sale_dateend' => 'required|date_format:d/m/Y',
            'product_notice' => 'string',
            'description' => 'string',

            /*Relations*/
            
            'taxes.*' => '',
            'manutention_officer_id' => 'required|integer',

        ];
    }

    public function taxes()
    {
        return $this->belongsToMany('App\Tax', 'products_taxes_pivot', 'product_id', 'tax_id')->withTimestamps();
    }

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
}
