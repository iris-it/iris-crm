<?php

namespace App\Repositories;

use App\Receipt;
use InfyOm\Generator\Common\BaseRepository;

class ReceiptRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'topic',
        'supplier',
        'order_date',
        'delivery_deadline',
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
        return Receipt::class;
    }
}
