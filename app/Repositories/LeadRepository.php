<?php

namespace App\Repositories;

use App\Lead;
use InfyOm\Generator\Common\BaseRepository;

class LeadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lead_name',
        'website',
        'activity_sector',
        'workforce',
        'type',
        'ape_number',
        'siret_number',
        'phone_number',
        'status',
        'address',
        'zipcode',
        'city',
        'country',
        'free_label'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Lead::class;
    }
}
