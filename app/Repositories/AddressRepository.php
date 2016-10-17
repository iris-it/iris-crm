<?php

namespace App\Repositories;

use App\Address;
use InfyOm\Generator\Common\BaseRepository;

class AddressRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'street_label',
        'street_detail',
        'zipcode',
        'city',
        'country',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Address::class;
    }
}
