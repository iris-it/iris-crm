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
        'is_vat',

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
        'is_vat' => 'boolean',

    ];

    // SCOPES
    public function scopeOnlyVat($query)
    {
        return $query->where("is_vat", true);
    }

    // SCOPES
    public function scopeMixedTaxes($query)
    {
        return $query->where("is_vat", false);
    }

    public function scopeIsActive($query)
    {
        return $query->where('is_active', true);
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
