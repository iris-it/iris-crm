<?php

namespace App;

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
        'avatar',
        'address',
        'zipcode',
        'city',
        'country',
        'type',
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
        'avatar' => 'string',
        'address' => 'string',
        'zipcode' => 'string',
        'city' => 'string',
        'country' => 'string',
        'type' => 'boolean',
        'free_label' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */

    public function rules()
    {
        return [

            'civility' => 'string|between:2,3|required',
            'lastname' => 'string|max:255|required',
            'firstname' => 'string|max:255|required',
            'post' => 'string|max:255|required',
            'email' => 'required|email|max:255|unique:contacts,email,' . $this->id,
            'phone_number' => array("regex:/^\+?[0-9]{10,20}$/im"),
            'avatar' => 'string',
            'address' => 'string|max:255|required',
            'zipcode' => 'string|max:255|required',
            'city' => 'string|max:255|required',
            'country' => 'string|max:255|required',
            'type' => 'boolean',
            'free_label' => 'string',

            /*Relations*/

            'account_name_id' => 'integer',
            'lead_name_id' => 'integer',
            'contact_owner_id' => 'required|integer'

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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function quotes()
    {
        return $this->hasMany('App\Quote');
    }

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }
}
