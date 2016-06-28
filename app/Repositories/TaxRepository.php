<?php

namespace App\Repositories;

use App\Tax;
use InfyOm\Generator\Common\BaseRepository;

class TaxRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'value',
        'is_active'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tax::class;
    }
}
