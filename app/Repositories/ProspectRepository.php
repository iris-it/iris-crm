<?php

namespace App\Repositories;

use App\Models\Prospect;
use InfyOm\Generator\Common\BaseRepository;

class ProspectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'prospect_name',
        'website',
        'activity_sector',
        'workforce',
        'type',
        'ape_number',
        'siret_number',
        'phone_number',
        'status',
        'account_owner',
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
        return Prospect::class;
    }
}
