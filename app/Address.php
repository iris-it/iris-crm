<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Account
 * @package App\Models
 */
class Address extends Model
{
    use SoftDeletes;

    public $table = 'addresses';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'street_label',
        'street_detail',
        'zipcode',
        'city',
        'country',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'street_label' => 'string',
        'street_detail' => 'string',
        'zipcode' => 'integer',
        'city' => 'string',
        'country' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules($id)
    {

        return
            [
                'name' => 'required|max:255',
                'street_label' => 'required|max:255',
                'street_detail' => 'max:255',
                'zipcode' => 'required|max:10|integer',
                'city' => 'required|max:255',
                'country' => 'required|max:255',
            ];
    }


    public function establishments()
    {
        return $this->belongsToMany('App\Establishment', 'establishments_addresses_pivot', 'address_id', 'establishment_id')->withPivot('type')->withTimestamps();
    }
}
