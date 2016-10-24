<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Office
 * @package App\Models
 */
class Office extends Model
{
    use SoftDeletes;

    public $table = 'offices';


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
        'is_main',
        'is_active',
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
        'is_main' => 'boolean',
        'is_active' => 'boolean',
        'free_label' => 'string'
    ];


    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    public function addresses()
    {
        return $this->belongsToMany('App\Address', 'addresses_offices_pivot', 'office_id', 'address_id')->withPivot('type')->withTimestamps();
    }

    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }

    public function quotes()
    {
        return $this->hasMany('App\Quote');
    }

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    public function receipts()
    {
        return $this->hasManyThrough('App\Receipt', 'App\Quote');
    }


}
