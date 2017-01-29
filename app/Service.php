<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Service
 * @package App\Models
 */
class Service extends Model
{
    use SoftDeletes;

    public $table = 'services';


    protected $dates = ['deleted_at', 'sale_datestart', 'sale_dateend'];


    public $fillable = [
        'name',
        'is_active',
        'category',
        'sale_unit',
        'ht_price',
        'ttc_price',
        'sale_datestart',
        'sale_dateend',
        'service_avatar',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'is_active' => 'boolean',
        'category' => 'string',
        'sale_unit' => 'string',
        'description' => 'string'
    ];


    // SCOPES
    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(function ($query) use ($keyword) {
                $query->where("name", "LIKE", "%$keyword%")
                    ->orWhere("category", "LIKE", "%$keyword%")
                    ->orWhere("description", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }


    //MUTATORS
    /**
     * Custom properties
     * @return string
     */
    public function getTypeAttribute()
    {
        return 'service';
    }

    /**
     * Mutate deadline to FR with Carbon
     * @param $date
     * @return string
     */
    public function getSaleDateStartAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    /**
     * Mutate deadline from FR to Carbon date
     * @param $date
     */
    public function setSaleDateStartAttribute($date)
    {
        $this->attributes['sale_datestart'] = Carbon::createFromFormat('d/m/Y', $date);
    }

    //MUTATORS
    /**
     * Mutate deadline to FR with Carbon
     * @param $date
     * @return string
     */
    public function getSaleDateEndAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    /**
     * Mutate deadline from FR to Carbon date
     * @param $date
     */
    public function setSaleDateEndAttribute($date)
    {
        $this->attributes['sale_dateend'] = Carbon::createFromFormat('d/m/Y', $date);
    }


    public function organization()
    {
        return $this->belongsTo('App\Organization', 'organization_id');
    }

    public function taxes()
    {
        return $this->belongsToMany('App\Tax', 'services_taxes_pivot', 'service_id', 'tax_id')->withTimestamps();
    }

}
