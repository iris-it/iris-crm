<?php


return [

    /*
    |--------------------------------------------------------------------------
    | Model Configuration
    |--------------------------------------------------------------------------
    |
    | Because JWT auth read the sub in the jwt and it's not
    | the id column but the sub column so..
    |
    */

    'user_primary_key' => env('USER_PRIMARY_KEY', 'id'),

    /*
    |--------------------------------------------------------------------------
    | Service Configuration
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

    'cms' => [
        'master_path' => env('CMS_MASTER_PATH'),
        'path' => env('CMS_PATH'),
    ],

    'osjs' => [
        'disk' => env('OSJS_DISK'),
        'vfs_path' => env('OSJS_VFS_PATH')
    ],

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
