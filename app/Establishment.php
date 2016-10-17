<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Account
 * @package App\Models
 */
class Establishment extends Model
{
    use SoftDeletes;

    public $table = 'establishments';


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
            'free_label' => 'string',


        ];
    }



    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    public function lead()
    {
        return $this->belongsTo('App\Lead');
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

    public function addresses()
    {
        return $this->belongsToMany('App\Address', 'establishments_addresses_pivot', 'establishment_id', 'address_id')->withPivot('type')->withTimestamps();
    }
}
