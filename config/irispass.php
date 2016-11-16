<?php


return [

    /*
    |--------------------------------------------------------------------------
    | Keycloak Configuration
    |--------------------------------------------------------------------------
    |
    | Because JWT auth read the sub in the jwt and it's not
    | the id column but the sub column so..
    | 'osjs' => [
    |    'driver' => 'local',
    |    'root'   => env('OSJS_VFS_PATH'),
    |  ],
    |
    */

    'keycloak' => [
        'username' => env('KEYCLOAK_USERNAME'),
        'password' => env('KEYCLOAK_PASSWORD'),
    ],

];
