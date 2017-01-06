<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'websites';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['identifier', 'username', 'email', 'is_active', 'url'];

    protected $casts = [
        'is_active' => 'boolean'
    ];


    public function organization()
    {
        return $this->belongsTo('App\Organization', 'organization_id');
    }

}
