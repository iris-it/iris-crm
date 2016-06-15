<?php

namespace App\Repositories;

use App\Models\Contact;
use InfyOm\Generator\Common\BaseRepository;

class ContactRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'civility',
        'lastname',
        'firstname',
        'post',
        'email',
        'phone_number',
        'account_name',
        'contact_owner',
        'avatar',
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
        return Contact::class;
    }
}
