<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Invoice
 * @package App\Models
 */
class Invoice extends Model
{
    use SoftDeletes;

    public $table = 'invoices';


    protected $dates = ['created_at', 'deleted_at', 'deadline'];


    public $fillable = [
        'topic',
        'phase',
        'deadline',
        'description',
        'ht_price',
        'ttc_price',
        'special_conditions',
        'address',
        'zipcode',
        'city',
        'country',
        'converted'
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
        'address' => 'string',
        'zipcode' => 'string',
        'city' => 'string',
        'country' => 'string',
        'converted' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules()
    {
        return [

            'topic' => 'required|max:255|string',
            'phase' => 'required|max:255|string',
            'deadline' => 'required',
            'description' => 'string',
            'ht_price' => 'numeric',
            'ttc_price' => 'numeric',
            'special_conditions' => 'string',
            'address' => 'required|string',
            'zipcode' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',

            /*Relations*/

            'contact_name_id' => 'required|integer',
            'quote_id' => 'integer',
            'products.*' => '',
            'services.*' => '',


        ];
    }

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

    public function establishment()
    {
        return $this->belongsTo('App\Establishment');
    }

}
