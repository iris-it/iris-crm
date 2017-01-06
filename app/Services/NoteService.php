<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 28/11/2016
 * Time: 15:24
 */

namespace App\Services;


use App\Note;

class NoteService
{

    private $user_id;
    private $organization_id;
    private $entity;
    private $entity_id;

    public function initialize($user_id, $organization_id, $entity = null, $entity_id = null)
    {
        $this->user_id = $user_id;
        $this->organization_id = $organization_id;
        $this->entity = $entity;
        $this->entity_id = $entity_id;
    }

    public function getNotes()
    {

        // private => user only

        // private => entity

        // public =>
        return Note::where('owner_id', $this->user_id);

        $shared_notes = Note::where('private', false)->where('organization_id', $this->organization->id)->get();

    }

    public function createNote()
    {

    }

    public function updateNote()
    {

    }

    public function deleteNote()
    {

    }

}
