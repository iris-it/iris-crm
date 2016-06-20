<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Quote
 * @package App\Models
 */
class Quote extends Model
{
    use SoftDeletes;

    public $table = 'quotes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'topic',
        'phase',
        'deadline',
        'description',
        'special_conditions',
        'address',
        'zipcode',
        'city',
        'country'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'topic' => 'string',
        'phase' => 'string',
        'deadline' => 'string',
        'description' => 'string',
        'special_conditions' => 'string',
        'address' => 'string',
        'zipcode' => 'string',
        'city' => 'string',
        'country' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }
}
