<?php

namespace App\Repositories;

use App\Models\Quote;
use InfyOm\Generator\Common\BaseRepository;

class QuoteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'topic',
        'account_name',
        'phase',
        'contact_name',
        'deadline',
        'contact_owner',
        'description',
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
