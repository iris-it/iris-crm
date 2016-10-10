<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProvider extends Model
{

    protected $table = 'oauth_identities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'provider_user_id', 'provider', 'access_token'];


    /**
     * An user has one profile
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
