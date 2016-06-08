<?php

namespace App\Providers\OAuth2;


use SocialNorm\Exceptions\InvalidAuthorizationCodeException;
use SocialNorm\Providers\OAuth2Provider;

class KeycloakProvider extends OAuth2Provider
{
    protected $authorizeUrl = "http://c64.ovh/auth/realms/irispass/protocol/openid-connect/auth";
    protected $accessTokenUrl = "http://c64.ovh/auth/realms/irispass/protocol/openid-connect/token";
    protected $userDataUrl = "http://c64.ovh/auth/realms/irispass/protocol/openid-connect/userinfo";

    protected $scope = [
        'view-profile',
        'manage-account',
    ];

    protected $headers = [
        'authorize' => [],
        'access_token' => [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ],
        'user_details' => [],
    ];

    protected function compileScopes()
    {
        return implode(' ', $this->scope);
    }

    protected function getAuthorizeUrl()
    {
        return $this->authorizeUrl;
    }

    protected function getAccessTokenBaseUrl()
    {
        return $this->accessTokenUrl;
    }

    protected function getUserDataUrl()
    {
        return $this->userDataUrl;
    }

    protected function parseTokenResponse($response)
    {
        return $this->parseJsonTokenResponse($response);
    }

    protected function requestUserData()
    {

        $url = $this->buildUserDataUrl();
        $response = $this->httpClient->get($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->accessToken
            ]
        ]);
        return $this->parseUserDataResponse((string)$response->getBody());
    }

    protected function parseUserDataResponse($response)
    {
        return json_decode($response, true);
    }

    protected function userId()
    {
        return $this->getProviderUserData('sub');
    }

    protected function nickname()
    {
        return $this->getProviderUserData('preferred_username');
    }

    protected function fullName()
    {
        return $this->getProviderUserData('given_name') . ' ' . $this->getProviderUserData('family_name');
    }

    protected function avatar()
    {
        return "";
    }

    protected function email()
    {
        return $this->getProviderUserData('email');
    }
}
