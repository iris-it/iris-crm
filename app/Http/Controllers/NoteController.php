<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Note;
use App\Office;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function index(Request $request)
    {
        $personal_notes = Note::where('owner_id', $request->user()->id);

        $shared_notes = Note::where('private', false)->where('organization_id', $this->organization->id)->get();

        return view('pages.notes.index')->with(compact('personal_notes', 'shared_notes'));
    }

    public function create(Request $request)
    {
        $entity = $request->get('entity');

        $entity_id = $request->get('entity_id');

        return view('pages.notes.create')->with(compact('entity', 'entity_id'));
    }

    public function store(NoteRequest $request)
    {
        $data = $request->all();

        $entity = $this->getEntity($data['entity'], $data['entity_id']);

        $entity->createNote($data, $request->user());

        return redirect($request->fullUrl());
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update($id, NoteRequest $request)
    {
        $data = $request->all();

        $entity = $this->getEntity($data['entity'], $data['entity_id']);

        $entity->updateNote($id, $data);

        return redirect($request->fullUrl());
    }

    public function destroy($id, NoteRequest $request)
    {
        $data = $request->all();


        $entity = $this->getEntity($data['entity'], $data['entity_id']);

        $entity->deleteNote($id, $data);

        return redirect($request->fullUrl());
    }

}
