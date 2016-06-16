<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Estimate
 * @package App\Models
 */
class Estimate extends Model
{
    use SoftDeletes;

    public $table = 'estimates';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'topic',
        'account_name',
        'phase',
        'contact_name',
        'deadline',
        'contact_owner',
        'description',
        'special_conditions',
        'address',
        'zipcode',
        'city',
        'country'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'topic' => 'string',
        'account_name' => 'string',
        'phase' => 'string',
        'contact_name' => 'string',
        'deadline' => 'string',
        'contact_owner' => 'string',
        'description' => 'string',
        'special_conditions' => 'string',
        'address' => 'string',
        'zipcode' => 'string',
        'city' => 'string',
        'country' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
