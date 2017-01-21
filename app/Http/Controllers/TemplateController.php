<?php

namespace App\Http\Controllers;


use App\Http\Requests\TemplateRequest;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class TemplateController extends Controller
{


    /**
     * Display a listing of the Template.
     */

    public function index()
    {

        $templates = $this->organization->templates;
        return view('pages.templates.index')->with('templates', $templates);

    }

    /**
     * Show the form for creating a new Template.
     */

    public function create()
    {
        return view('pages.templates.create');
    }

    /**
     * Store a newly created Template in storage.
     *
     */

    public function store(TemplateRequest $request)
    {
        $input = $request->all();

        if ($template = Template::create($input)) {


            $template->organization()->associate($this->organization);
            $template->save();

            Flash::success(Lang::get('app.general:create-success'));

        } else {

            Flash::error(Lang::get('app.general:create-failed'));
            return redirect(action('TemplateController@create'));

        }

        return redirect(action('TemplateController@index'));
    }

    /**
     * Display the specified Template.
     */

    public function show()
    {
    }

    /**
     * Show the form for editing the specified Template.
     */

    public function edit()
    {

    }

    /**
     * Update the specified Template in storage.
     * @param $id
     * @param TemplateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function update()
    {

    }

    /**
     * Remove the specified Template from storage.
     *
     * @param  int $id
     *
     * @return Response
     */

    public function destroy()
    {

    }
}
