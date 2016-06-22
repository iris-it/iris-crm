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
    public function rules()
    {
        return [

            'topic' => 'required|max:255|string',
            'phase' => 'required|max:255|string',
            'deadline' => 'required|date_format:d/m/Y',
            'description' => 'string',
            'special_conditions' => 'string',
            'address' => 'required|string',
            'zipcode' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',

            /*Relations*/

            'account_name_id' => 'required|integer',
            'contact_name_id' => 'required|integer',
            'quote_owner_id' => 'required|integer'


        ];
    }


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
