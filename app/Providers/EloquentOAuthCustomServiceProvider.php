<?php

namespace App\Providers;

use AdamWathan\EloquentOAuthL5\EloquentOAuthServiceProvider;
use SocialNorm\Keycloak\KeycloakProvider;


class EloquentOAuthCustomServiceProvider extends EloquentOAuthServiceProvider
{
    protected function getProviderLookup()
    {
        // Merge the default providers if you like, or override entirely
        // to skip loading those providers completely.
        return array_merge($this->providerLookup, [
            'keycloak' => KeycloakProvider::class
        ]);
    }
}
