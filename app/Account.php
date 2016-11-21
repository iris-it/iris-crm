<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Account
 * @package App\Models
 */
class Account extends Model
{
    use SoftDeletes, HasMediaTrait;


    public $table = 'accounts';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'website',
        'logo',
        'notes',
        'is_lead',
        'converted'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'website' => 'string',
        'notes' => 'string',
        'is_lead' => 'boolean',
        'converted' => 'boolean',
    ];


    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    public function offices()
    {
        return $this->hasMany('App\Office');
    }

    public function invoices()
    {
        return $this->hasManyThrough('App\Invoice', 'App\Office');
    }

    public function quotes()
    {
        return $this->hasManyThrough('App\Quote', 'App\Office');
    }

    public function contacts()
    {
        return $this->hasManyThrough('App\Contact', 'App\Office');
    }

}
