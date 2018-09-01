<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authorization API
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'api' => [
        "uri" => [
            "base" => env("R2G_AUTH_URI_BASE", "localhost:7010"),
            "endpoint" => env("R2G_AUTH_URI_ENDPOINT", "/oauth/token")
        ]
    ],

];
