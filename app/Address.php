<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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


    public function offices()
    {
        return $this->belongsToMany('App\Office', 'addresses_offices_pivot', 'address_id', 'office_id')->withPivot('type')->withTimestamps();
    }
}
