<?php

use App\User;

return [
    'model' => User::class,

    'table' => 'oauth_identities',

    'custom-providers' => [
        'keycloak' => [
            'client_id' => env('AUTH_CLIENT_ID'),
            'client_secret' => env('AUTH_CLIENT_SECRET'),
            'redirect_uri' => env('APP_URL') . 'keycloak/callback',
            'scope' => [],
            'provider_class' => App\Providers\OAuth2\KeycloakProvider::class
        ],
    ],
];
