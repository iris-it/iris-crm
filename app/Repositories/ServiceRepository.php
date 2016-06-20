<?php

namespace App\Repositories;

use App\Service;
use InfyOm\Generator\Common\BaseRepository;

class ServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'service_name',
        'is_active',
        'category',
        'sale_unit',
        'ht_price',
        'sale_datestart',
        'sale_dateend',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Service::class;
    }
}
