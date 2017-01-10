<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Quote
 * @package App\Models
 */
class Quote extends Model
{
    use SoftDeletes;

    public $table = 'quotes';


    protected $dates = ['created_at', 'deleted_at', 'deadline'];


    public $fillable = [
        'topic',
        'phase',
        'deadline',
        'description',
        'ht_price',
        'ttc_price',
        'special_conditions',
        'content_backup',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'topic' => 'string',
        'phase' => 'string',
        'description' => 'string',
        'special_conditions' => 'string',
        'content_backup' => 'array',
        'content' => 'array'
    ];

    //MUTATORS
    /**
     * Mutate deadline to FR with Carbon
     * @param $date
     * @return string
     */
    public function getDeadlineAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    /**
     * Mutate deadline from FR to Carbon date
     * @param $date
     */
    public function setDeadlineAttribute($date)
    {
        $this->attributes['deadline'] = Carbon::createFromFormat('d/m/Y', $date);
    }

    public function office()
    {
        return $this->belongsTo('App\Office');
    }

    public function receipt()
    {
        return $this->hasOne('App\Receipt');
    }
}
