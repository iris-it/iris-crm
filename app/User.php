<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function accounts()
    {
        return $this->hasMany('App\Account');
    }

    public function leads()
    {
        return $this->hasMany('App\Lead');
    }

    public function quotes()
    {
        return $this->hasMany('App\Quote');
    }

    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }
    

}

