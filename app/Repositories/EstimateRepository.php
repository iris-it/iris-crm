<?php

namespace App\Repositories;

use App\Models\Estimate;
use InfyOm\Generator\Common\BaseRepository;

class EstimateRepository extends BaseRepository
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
        return Estimate::class;
    }
}
