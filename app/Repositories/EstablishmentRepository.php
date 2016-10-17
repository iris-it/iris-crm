<?php

namespace App\Repositories;

use App\Establishment;
use InfyOm\Generator\Common\BaseRepository;

class EstablishmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'website',
        'activity_sector',
        'workforce',
        'type',
        'ape_number',
        'siret_number',
        'phone_number',
        'is_main',
        'is_active',
        'free_label'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Establishment::class;
    }
}
