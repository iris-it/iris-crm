<?php

namespace App\Repositories;

use App\Account;
use InfyOm\Generator\Common\BaseRepository;

class AccountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'converted',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Account::class;
    }
}
