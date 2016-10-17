<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Account
 * @package App\Models
 */
class Account extends Model
{
    use SoftDeletes;

    public $table = 'accounts';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'converted'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'converted' => 'boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules($id) {

        return
            [
            'name' => 'required|max:255|unique:accounts,name,' . $id ,
            'converted' => 'boolean', //


            /*Relations*/

            'account_owner_id' => 'integer|required'

        ];
    }

    

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function establishments()
    {
        return $this->hasMany('App\Establishment');
    }

}
