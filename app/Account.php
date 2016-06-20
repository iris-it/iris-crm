<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Account
 * @package App\Models
 */
class Account extends Model
{
    use SoftDeletes;

    public $table = 'accounts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'account_name',
        'website',
        'activity_sector',
        'workforce',
        'type',
        'ape_number',
        'siret_number',
        'phone_number',
        'is_active',
        'billing_address',
        'delivery_address',
        'billing_zipcode',
        'delivery_zipcode',
        'billing_city',
        'delivery_city',
        'billing_country',
        'delivery_country',
        'free_label'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'account_name' => 'string',
        'website' => 'string',
        'activity_sector' => 'string',
        'workforce' => 'integer',
        'type' => 'string',
        'ape_number' => 'string',
        'siret_number' => 'string',
        'phone_number' => 'string',
        'is_active' => 'boolean',
        'billing_address' => 'string',
        'delivery_address' => 'string',
        'billing_zipcode' => 'string',
        'delivery_zipcode' => 'string',
        'billing_city' => 'string',
        'delivery_city' => 'string',
        'billing_country' => 'string',
        'delivery_country' => 'string',
        'free_label' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function quotes()
    {
        return $this->hasMany('App\Quote');
    }

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    public function contacts()
    {
        return $this->morphMany('App\Contact', 'boundable');
    }
}
