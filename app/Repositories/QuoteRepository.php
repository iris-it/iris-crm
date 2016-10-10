<?php

namespace App\Repositories;

use App\Quote;
use InfyOm\Generator\Common\BaseRepository;

class QuoteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'topic',
        'phase',
        'deadline',
        'description',
        'ttc_price',
        'special_conditions',
        'address',
        'zipcode',
        'city',
        'country'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Quote::class;
    }
}
