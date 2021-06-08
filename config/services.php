<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

   

    'facebook' => [
        'client_id' => "702858977078636",
        'client_secret' => "43a522aff0d139af8fe2c10d95a8bea7",
        'redirect' => 'http://localhost:8000/fbres',
    ],

    

    

    'google' => [
        'client_id' => "655529793068-qlp37u2lnueabmdvrmgi8b1l741fcabm.apps.googleusercontent.com",
        'client_secret' => "XqNSlsv3yLFSZ27KiN-E7ckC",
        'redirect' => 'http://localhost:8000/googleres',
    ],

   



];
