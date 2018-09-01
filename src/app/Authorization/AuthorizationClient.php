<?php

namespace App\Authorization;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class AuthorizationClient
{

    /**
     * @param $username
     * @param $password
     * @throws GuzzleException
     */
    public static function authorize($username, $password){

        // Load configuration from file/env
        $base_uri = config('authorization.api.uri.base');
        $endpoint = config('authorization.api.uri.endpoint');

        try {
            $client = new Client(['base_uri' => $base_uri]);
            $response = $client->request("POST", $endpoint, [
                //'auth' => ['clientid', 'password'], // Use this to create authorization token
                'headers' => [
                    'Authorization' => "Basic Y2xpZW50aWQ6c2VjcmV0",
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ],
                'form_params' => [
                    "grant_type" => "password",
                    "username" => $username,
                    "password" => $password
                ]
            ]);
            if ($response->getStatusCode() == 200) {
                $token = TokenResponse::fromJson($response->getBody()->getContents());
                session()->put("R_AUTH_TOKEN", "Bearer " . $token->access_token);
            }
        } catch (GuzzleException $e){
            throw $e;
        }

    }

}