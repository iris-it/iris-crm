<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Prospect
 * @package App\Models
 */
class Prospect extends Model
{
    use SoftDeletes;

    public $table = 'prospects';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'prospect_name',
        'website',
        'activity_sector',
        'workforce',
        'type',
        'ape_number',
        'siret_number',
        'phone_number',
        'status',
        'account_owner',
        'address',
        'zipcode',
        'city',
        'country',
        'free_label'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'prospect_name' => 'string',
        'website' => 'string',
        'activity_sector' => 'string',
        'workforce' => 'integer',
        'type' => 'string',
        'ape_number' => 'string',
        'siret_number' => 'string',
        'phone_number' => 'string',
        'status' => 'string',
        'account_owner' => 'string',
        'address' => 'string',
        'zipcode' => 'string',
        'city' => 'string',
        'country' => 'string',
        'free_label' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
