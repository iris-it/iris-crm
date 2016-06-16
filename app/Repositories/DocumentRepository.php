<?php

namespace App\Repositories;

use App\Models\Document;
use InfyOm\Generator\Common\BaseRepository;

class DocumentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'document_name',
        'version',
        'document_upload',
        'authorizations',
        'writers',
        'readers',
        'document_state'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Document::class;
    }
}
