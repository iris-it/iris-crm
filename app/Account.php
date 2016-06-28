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
        'name',
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
        'name' => 'string',
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
    public static function rules($id) {

        return
            [
            'name' => 'required|max:255|unique:accounts,name,' . $id ,
            'website' => 'string|max:255',
            'activity_sector' => 'string|max:255',
            'workforce' => 'integer',
            'type' => 'required|string|max:255',
            'ape_number' => ['required', "regex:/(^[0-9]{1,2}\.[0-9]{1,2}[A-Z]$|^[0-9]{1,2}\.[0-9]{1,2})$/im"],
            'siret_number' => ['required', "regex:/^[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{5}$/im", 'unique:accounts,siret_number,' . $id,],
            'phone_number' => ["regex:/^\+?[0-9]{10,20}$/im"],
            'is_active' => 'required|boolean',
            'billing_address' => 'required|string',
            'delivery_address' => 'required|string',
            'billing_zipcode' => 'required|string',
            'delivery_zipcode' => 'required|string',
            'billing_city' => 'required|string',
            'delivery_city' => 'required|string',
            'billing_country' => 'required|string',
            'delivery_country' => 'required|string',
            'free_label' => 'string',

            /*Relations*/

            'account_owner_id' => 'integer|required'

        ];
    }

    

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
        return $this->hasMany('App\Contact');
    }
}
