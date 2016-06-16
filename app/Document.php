<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Document
 * @package App\Models
 */
class Document extends Model
{
    use SoftDeletes;

    public $table = 'documents';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'document_name',
        'version',
        'document_upload',
        'authorizations',
        'writers',
        'readers',
        'document_state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'document_name' => 'string',
        'version' => 'string',
        'document_upload' => 'string',
        'authorizations' => 'string',
        'writers' => 'string',
        'readers' => 'string',
        'document_state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
