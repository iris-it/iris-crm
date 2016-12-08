<?php


///////////////////////////////////////////////////////////////////////////
//  Management                                                           //
///////////////////////////////////////////////////////////////////////////


// Dashboard
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push(trans('app.general:dashboard'), action('HomeController@index'));
});

//  >  Accounts
Breadcrumbs::register('accounts', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('app.general:accounts'), action('AccountController@index'));
});
