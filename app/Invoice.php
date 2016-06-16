<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Invoice
 * @package App\Models
 */
class Invoice extends Model
{
    use SoftDeletes;

    public $table = 'invoices';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'topic',
        'account_name',
        'phase',
        'contact_name',
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
        'account_name' => 'string',
        'phase' => 'string',
        'contact_name' => 'string',
        'deadline' => 'date',
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

    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    public function quote()
    {
        return $this->belongsTo('App\Quote');
    }
}
