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
     * Homepage
     */
    Route::get('/', 'HomeController@index');

    /*
     * Authentication actions
     */
    Route::get('keycloak/profile', "AuthController@userProfile");
    Route::get('keycloak/logout', "AuthController@logout");

});

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

Route::resource('accounts', 'AccountController');

Route::resource('leads', 'LeadController');

Route::resource('contacts', 'ContactController');

Route::resource('quotes', 'QuoteController');

Route::resource('orders', 'OrderController');

Route::resource('invoices', 'InvoiceController');

Route::resource('products', 'ProductController');

Route::resource('services', 'ServiceController');

Route::resource('taxes', 'TaxController');


