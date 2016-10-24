<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App\Models
 */
class Receipt extends Model
{
    use SoftDeletes;

    public $table = 'receipts';
    

    protected $dates = ['deleted_at', 'order_date', 'delivery_deadline'];


    public $fillable = [
        'topic',
        'supplier',
        'order_date',
        'delivery_deadline',
        'description',
        'special_conditions',
        'address',
        'zipcode',
        'city',
        'country',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'topic' => 'string',
        'supplier' => 'string',
        'description' => 'string',
        'special_conditions' => 'string',
        'address' => 'string',
        'zipcode' => 'string',
        'city' => 'string',
        'country' => 'string',
        'content' => 'array'
    ];

    //MUTATORS
    /**
     * Mutate order_date to FR with Carbon
     * @param $date
     * @return string
     */
    public function getOrderDateAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
    /**
     * Mutate order_date from FR to Carbon date
     * @param $date
     */
    public function setOrderDateAttribute($date)
    {
        $this->attributes['order_date'] = Carbon::createFromFormat('d/m/Y', $date);
    }

    /**
     * Mutate delivery_deadline to FR with Carbon
     * @param $date
     * @return string
     */
    public function getDeliveryDeadlineAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
    /**
     * Mutate delivery_deadline from FR to Carbon date
     * @param $date
     */
    public function setDeliveryDeadlineAttribute($date)
    {
        $this->attributes['delivery_deadline'] = Carbon::createFromFormat('d/m/Y', $date);
    }

    public function quote()
    {
        return $this->belongsTo('App\Quote');
    }
}
