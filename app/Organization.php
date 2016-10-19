<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organizations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $dates = ['created_at','deleted_at', 'deadline'];

    protected $fillable = [
        'uuid',
        'name',
        'address',
        'address_comp',
        'phone',
        'email',
        'website',
        'is_active',
        'status',
        'siret_number',
        'siren_number',
        'tva_number',
        'ape_number',
        'licence_id',
        'owner_id'
    ];

    protected $casts = [

        'name' => 'string',
        'address' => 'string',
        'address_comp' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'website' => 'string',
        'is_active' => 'boolean',
        'status' => 'string',
        'siret_number' => 'string',
        'siren_number' => 'string',
        'tva_number' => 'string',
        'ape_number' => 'string',

    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'address_comp' => 'max:255',
            'phone' => 'required|min:10',
            'email' => 'email|max:255',
            'website' => 'max:500',
            'status' => 'required|string|max:255',
            'siren_number' => array("regex:/^[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}$/im", 'unique:organizations,siren_number,' . $this->id,),
            'siret_number' => array('required', "regex:/^[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{5}$/im", 'unique:organizations,siret_number,' . $this->id,),
            'ape_number' => array('required', "regex:/(^[0-9]{1,2}\.[0-9]{1,2}[A-Z]$|^[0-9]{1,2}\.[0-9]{1,2})$/im"),
            'tva_number' => array('required', "regex:/^[A-Z]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}[ \.\-]?[0-9]{3}$/im"),
        ];

    }

    /**
     * An organization belongs to an user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * An organization has many users
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     * An organization has many groups
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function groups()
    {
        return $this->hasMany('App\UserGroup');
    }

    /**
     * An organization has one website
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function website()
    {
        return $this->hasOne('App\Website');
    }

    public function licence()
    {
        return $this->belongsTo('App\Licence');
    }

    /**
     * An organization determines which entities the user can access
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function accounts()
    {
        return $this->hasMany('App\Account');
    }

    public function establishments()
    {
        return $this->hasManyThrough('App\Establishment' , 'App\Account');
    }
    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function services()
    {
        return $this->hasMany('App\Service');
    }

    public function taxes()
    {
        return $this->hasMany('App\Tax');
    }



}
