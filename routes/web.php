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

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;

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
         * Homepage (Dashboard)
         */
        Route::get('/home', 'HomeController@index');

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

        Route::resource('invoices', 'InvoiceController');

        Route::resource('products', 'ProductController');

        Route::resource('services', 'ServiceController');

        Route::resource('taxes', 'TaxController');

        Route::resource('templates', 'TemplateController');
        Route::get('templates/generate/{type}/{id_entity}/{id_template}', 'TemplateController@generateTemplate');


        /*
         * Office resources
         */
        Route::get('account/{id}/offices/create', 'OfficeController@create');
        Route::post('accounts/{id}', 'OfficeController@store');
        Route::get('account/{id}/offices/{officeId}/show', 'OfficeController@show');
        Route::get('account/{id}/offices/{officeId}/edit', 'OfficeController@edit');
        Route::put('account/{id}/offices/{officeId}/update', 'OfficeController@update');

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


        /*
         * Receipt resources
         */

        Route::get('receipts/index', 'ReceiptController@index');
        Route::get('receipts/create', 'ReceiptController@create');
        Route::post('receipts/store/{id}', 'ReceiptController@store');
        Route::get('receipts/{id}/show', 'ReceiptController@show');
        Route::get('receipts/{id}/edit', 'ReceiptController@edit');
        Route::put('receipts/{id}/update', 'ReceiptController@update');
        Route::delete('receipts/{id}/delete', 'ReceiptController@destroy');

        /*
         * Notes resources
         */

        Route::get('notes/index', 'NoteController@index');
        Route::get('notes/create', 'NoteController@create');
        Route::post('notes/store', 'NoteController@store');
        Route::get('notes/{id}/show', 'NoteController@show');
        Route::get('notes/{id}/edit', 'NoteController@edit');
        Route::put('notes/{id}/update', 'NoteController@update');
        Route::delete('notes/{id}/delete', 'NoteController@destroy');

    });
});

/*
|--------------------------------------------------------------------------
| Image service
|--------------------------------------------------------------------------
|
|
*/
Route::get('images/{dir}/{img}', function ($dir, $img) {
    // serve an image with cache !
    // determine a lifetime and return as object instead of string
    $photo = Image::cache(function ($image) use ($dir, $img) {
        return $image->make(storage_path() . '/app/images/' . $dir . '/' . $img);
    }, 1, false);
    return Response::make($photo, 200, array('Content-Type' => 'image/jpeg'));
});



