<?php

namespace App\Authorization;


class TokenResponse
{

    public $access_token;

    public $token_type;

    public $expires_in;

    public $scope;

    public $jti;

    public function __construct($access_token, $token_type, $expires_in, $scope, $jti)
    {
        $this->access_token = $access_token;
        $this->token_type = $token_type;
        $this->expires_in = $expires_in;
        $this->scope = $scope;
        $this->jti = $jti;
    }

    /**
     * @param $json
     * @return TokenResponse
     */
    public static function fromJson($json){
        $parsed = json_decode($json);
        return new TokenResponse($parsed->access_token, $parsed->token_type, $parsed->expires_in, $parsed->scope, $parsed->jti);
    }

}