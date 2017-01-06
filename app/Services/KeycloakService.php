<?php

namespace App\Services;

use GuzzleHttp\Client;
use Irisit\IrispassShared\Model\User;

/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 25/06/2016
 * Time: 02:56
 */
class KeycloakService
{

    private $token;

    private $client;

    private $username;

    private $password;

    private $realm;

    private $user_representation;

    private $user_id;

    public function __construct()
    {
        $this->username = config('irispass.keycloak.username');

        $this->password = config('irispass.keycloak.password');

        $this->realm = env('AUTH_REALM');

        $this->client = new Client([
            'base_uri' => env('AUTH_SERVER'),
            'timeout' => 20.0,
        ]);

    }

    public function getToken()
    {

        $parameters = [
            'headers' => [
                'Accept' => 'application/json'
            ],
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => 'admin-cli',
                'username' => $this->username,
                'password' => $this->password,
            ]
        ];

        $response = $this->client->request('POST', "/auth/realms/master/protocol/openid-connect/token", $parameters);

        $response = json_decode($response->getBody());

        $this->token = $response->access_token;

        return $this;
    }

    public function getUsers()
    {
        $parameters = ['headers' => ['Accept' => 'application/json', 'Authorization' => 'Bearer ' . $this->token]];

        $response = $this->client->request('GET', '/auth/admin/realms/' . $this->realm . '/users', $parameters);

        return json_decode($response->getBody());
    }

    public function createUser()
    {

        $parameters = [
            'headers' => ['Authorization' => 'Bearer ' . $this->token],
            'json' => $this->user_representation
        ];

        $response = $this->client->request('POST', '/auth/admin/realms/' . $this->realm . '/users', $parameters);

        if ($response->getStatusCode() !== 201) {
            return false;
        }

        $user_id = basename($response->getHeaders()['Location'][0]);

        $this->user_id = $user_id;

        return $this;
    }

    public function updateUser()
    {

        $parameters = [
            'headers' => ['Authorization' => 'Bearer ' . $this->token],
            'json' => $this->user_representation
        ];

        $response = $this->client->request('PUT', '/auth/admin/realms/' . $this->realm . '/users/' . $this->user_id, $parameters);

        if ($response->getStatusCode() !== 201) {
            return false;
        }

        return $this;
    }


    public function deleteUser()
    {

        $parameters = [
            'headers' => ['Authorization' => 'Bearer ' . $this->token],
        ];

        $response = $this->client->request('DELETE', '/auth/admin/realms/' . $this->realm . '/users/' . $this->user_id, $parameters);

        if ($response->getStatusCode() !== 201) {
            return false;
        }

        return $this;
    }

    public function sendResetEmail()
    {
        $parameters = [
            'headers' => ['Authorization' => 'Bearer ' . $this->token],
            'json' => ['UPDATE_PASSWORD']
        ];

        $response = $this->client->request('PUT', '/auth/admin/realms/' . $this->realm . '/users/' . $this->user_id . '/execute-actions-email', $parameters);

        if ($response->getStatusCode() !== 200) {
            return false;
        }

        return $this;
    }

    public function makeUserRepresentation($organization_id, User $user)
    {

        $user_representation = [
            'enabled' => true,
            'groups' => ['users']
        ];

        if ($user->preferred_username) {
            $user_representation['username'] = $user->preferred_username;
        }

        if ($user->given_name) {
            $user_representation['firstName'] = $user->given_name;
        }

        if ($user->family_name) {
            $user_representation['lastName'] = $user->family_name;
        }

        if ($user->email) {
            $user_representation['email'] = $user->email;
        }

        if ($organization_id) {
            $user_representation['attributes'] = [
                'organization' => [strval($organization_id)],
                'role' => ['user']
            ];
        }

        $this->user_representation = $user_representation;

        return $this;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

}