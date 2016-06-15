<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact
 * @package App\Models
 */
class Contact extends Model
{
    use SoftDeletes;

    public $table = 'contacts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'civility',
        'lastname',
        'firstname',
        'post',
        'email',
        'phone_number',
        'account_name',
        'contact_owner',
        'avatar',
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
        'civility' => 'string',
        'lastname' => 'string',
        'firstname' => 'string',
        'post' => 'string',
        'email' => 'string',
        'phone_number' => 'string',
        'account_name' => 'string',
        'contact_owner' => 'string',
        'avatar' => 'string',
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
