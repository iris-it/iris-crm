<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(action('HomeController@index'));
});


/*
 * Authentication
 */
Route::get('keycloak/login', "AuthController@login");
Route::get('keycloak/authorize', "AuthController@authorizeUser");
Route::get('keycloak/callback', "AuthController@handleCallback");


/*
|--------------------------------------------------------------------------
| Application pages
|--------------------------------------------------------------------------
|
*/

Route::group(['middleware' => 'auth'], function () {

    /*
     * Homepage (Dashboard)
     */
    Route::get('/home', 'HomeController@index');

    /*
     * Authentication actions
     */
    Route::get('keycloak/profile', "AuthController@userProfile");
    Route::get('keycloak/logout', "AuthController@logout");

    /*
     * Organization creation ( access only on first login )
     */
    Route::get('organization/create', array('uses' => 'OrganizationController@create'));
    Route::post('organization', array('uses' => 'OrganizationController@store'));

    Route::group(['middleware' => 'hasOrganization'], function () {

        /*
         * Organization resources
         */
        Route::get('organization', array('uses' => 'OrganizationController@index'));
        Route::get('organization/edit', array('uses' => 'OrganizationController@edit'));
        Route::patch('organization/edit', array('uses' => 'OrganizationController@update'));

        /*
         * General resources
         */

        Route::resource('accounts', 'AccountController');

        Route::resource('leads', 'LeadController');

        Route::resource('quotes', 'QuoteController');

        Route::resource('orders', 'OrderController');

        Route::resource('invoices', 'InvoiceController');

        Route::resource('products', 'ProductController');

        Route::resource('services', 'ServiceController');

        Route::resource('taxes', 'TaxController');

        /*
         * Office resources
         */
        Route::get('account/{id}/offices/create', 'OfficeController@create');
        Route::post('account/{id}/offices', 'OfficeController@store');
        Route::get('account/{id}/offices/{officeId}/show', 'OfficeController@show');
        Route::get('account/{id}/offices/{officeId}/edit', 'OfficeController@edit');
        Route::delete('account/{id}/offices/{officeId}', 'OfficeController@destroy');


        /*
         * Contact resources
         */

        Route::get('contacts/index', 'ContactController@index');
        Route::get('contacts/create', 'ContactController@create');
        Route::post('contacts/store', 'ContactController@store');
        Route::get('contacts/{id}/show', 'ContactController@show');
        Route::get('contacts/{id}/edit', 'ContactController@edit');
        Route::put('contacts/{id}/update', 'ContactController@update');
        Route::delete('contacts/{id}/delete', 'ContactController@destroy');


    });
});



