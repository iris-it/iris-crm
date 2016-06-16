<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tax
 * @package App\Models
 */
class Tax extends Model
{
    use SoftDeletes;

    public $table = 'taxes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'value',
        'is_active',

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'value' => 'decimal',
        'is_active' => 'boolean',

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
    
}
