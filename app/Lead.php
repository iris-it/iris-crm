<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lead
 * @package App\Models
 */
class Lead extends Model
{
    use SoftDeletes;

    public $table = 'leads';
    

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
        'status',
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
        'name' => 'string',
        'website' => 'string',
        'activity_sector' => 'string',
        'workforce' => 'integer',
        'type' => 'string',
        'ape_number' => 'string',
        'siret_number' => 'string',
        'phone_number' => 'string',
        'status' => 'string',
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
    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:leads,name,' . $this->id,
            'website'=> 'url|max:255',
            'activity_sector' => 'string|max:255',
            'workforce' => 'integer',
            'type' => 'required|string|max:255',
            'ape_number' => array('required', "regex:/(^[0-9]{1,2}\.[0-9]{1,2}[A-Z]$|^[0-9]{1,2}\.[0-9]{1,2})$/im"),
            'siret_number' => array('required', "regex:/^[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{5}$/im", 'unique:accounts,siret_number,' . $this->id,),
            'phone_number' => array("regex:/^\+?[0-9]{10,20}$/im"),
            'status' => 'required|string|max:255',
            'address' => 'required|string',
            'zipcode' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'free_label' => 'string',

            /*Relations*/

            'account_owner_id' => 'integer|required'

        ];
    }



    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }
}
