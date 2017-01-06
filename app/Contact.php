<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact
 * @package App\Models
 */
class Contact extends Model
{
    use SoftDeletes;

    public $table = 'contacts';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'civility',
        'lastname',
        'firstname',
        'post',
        'email',
        'phone_number',
        'avatar',
        'free_label',

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'civility' => 'string',
        'lastname' => 'string',
        'firstname' => 'string',
        'post' => 'string',
        'email' => 'string',
        'phone_number' => 'string',
        'free_label' => 'string'
    ];


    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    public function office()
    {
        return $this->belongsTo(('App\Office'));
    }
}
