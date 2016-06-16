<?php

namespace App\Repositories;

use App\Models\Account;
use InfyOm\Generator\Common\BaseRepository;

class AccountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'account_name',
        'website',
        'activity_sector',
        'workforce',
        'type',
        'ape_number',
        'siret_number',
        'phone_number',
        'is_active',
        'account_owner',
        'billing_address',
        'delivery_address',
        'billing_zipcode',
        'delivery_zipcode',
        'billing_city',
        'delivery_city',
        'billing_country',
        'delivery_country',
        'free_label'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Account::class;
    }
}