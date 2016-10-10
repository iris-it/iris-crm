<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {

        if ($this->organization) {
            $groups = $this->organization->groups()->get();
            $users = $this->organization->users()->get();
        }

        return view('pages.home.index')->with(compact('organization', 'groups', 'users'));
    }
}
