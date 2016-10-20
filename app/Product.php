<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';
    

    protected $dates = ['deleted_at', 'sale_datestart', 'sale_dateend'];


    public $fillable = [
        'product_name',
        'is_active',
        'category',
        'ht_price',
        'ttc_price',
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
    public static function rules($id)
    {
        return [

            'product_name' => 'string|max:255|required',
            'is_active' => '',
            'category' => 'string|max:255|required',
            'ht_price' => 'numeric|required',
            'ttc_price' => 'numeric',
            'stock_disponibility' => 'integer|required',
            'product_avatar' => 'string',
            'sale_datestart' => 'required',
            'sale_dateend' => 'required',
            'product_notice' => 'string',
            'description' => 'string',

            /*Relations*/
            
            'taxes.*' => '',
            'manutention_officer_id' => 'required|integer',

        ];
    }


    //MUTATORS
    /**
     * Mutate deadline to FR with Carbon
     * @param $date
     * @return string
     */
    public function getSaleDateStartAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    /**
     * Mutate deadline from FR to Carbon date
     * @param $date
     */
    public function setSaleDateStartAttribute($date)
    {
        $this->attributes['sale_datestart'] = Carbon::createFromFormat('d/m/Y', $date);
    }



    //MUTATORS
    /**
     * Mutate deadline to FR with Carbon
     * @param $date
     * @return string
     */
    public function getSaleDateEndAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    /**
     * Mutate deadline from FR to Carbon date
     * @param $date
     */
    public function setSaleDateEndAttribute($date)
    {
        $this->attributes['sale_dateend'] = Carbon::createFromFormat('d/m/Y', $date);
    }


    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    public function taxes()
    {
        return $this->belongsToMany('App\Tax', 'products_taxes_pivot', 'product_id', 'tax_id')->withTimestamps();
    }

}
