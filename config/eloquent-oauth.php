<?php

use App\User;

return [
    'model' => User::class,
    'table' => 'oauth_identities',
    'providers' => [
        'keycloak' => [
            'client_id' => env('AUTH_CLIENT_ID'),
            'client_secret' => env('AUTH_CLIENT_SECRET'),
            'redirect_uri' => env('APP_URL') . '/keycloak/callback',
            'auth_server' => env('AUTH_SERVER'),
            'auth_realm' => env('AUTH_REALM'),
            'scope' => [],
        ],
    ],
];
