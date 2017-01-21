<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App\Models
 */
class Template extends Model
{
    use SoftDeletes;

    public $table = 'templates';


    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


    public $fillable = [
        'name',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'content' => 'string',
    ];


    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

}
