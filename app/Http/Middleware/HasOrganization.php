<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class HasOrganization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $organization = Auth::user()->organization()->first();

        if ($organization == null && env('STANDALONE_MODE') == true) {
            Flash::error(Lang::get('organization.fail-not-exist'));
            return redirect(action('OrganizationController@create'));
        } else if ($organization != null && env('STANDALONE_MODE') == true) {
            return $next($request);
        } else if ($organization == null && env('STANDALONE_MODE') == false) {
            //TODO redirect to irispass main instance
        } else {
            return $next($request);
        }

    }
}
