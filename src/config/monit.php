<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Monit Service URL
    |--------------------------------------------------------------------------
    |
    | This value defines the endpoint to which application error details
    | will be sent. It is used to report exceptions or failures to an external
    | monitoring or logging service, enabling quick diagnosis and response.
    |
    */

    'url' => env('MONIT_URL'),

    /*
    |--------------------------------------------------------------------------
    | Monit Service Bearer Token
    |--------------------------------------------------------------------------
    |
    | This value is the bearer token used to authorize requests sent to the
    | external Monit service. It ensures secure communication by verifying
    | the identity of the application making the request.
    |
    */

    'token' => env('MONIT_TOKEN'),

];
