<?php

namespace App\Repositories;

use App\Organization;
use InfyOm\Generator\Common\BaseRepository;

class OrganizationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'name',
        'address',
        'address_comp',
        'phone',
        'email',
        'website',
        'is_active',
        'status',
        'siret_number',
        'siren_number',
        'tva_number',
        'ape_number',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Organization::class;
    }
}
