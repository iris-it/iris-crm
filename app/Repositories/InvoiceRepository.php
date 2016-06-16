<?php

namespace App\Repositories;

use App\Models\Invoice;
use InfyOm\Generator\Common\BaseRepository;

class InvoiceRepository extends BaseRepository
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
        return Invoice::class;
    }
}
