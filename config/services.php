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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT'),
    ],

    'googleMap' => [
        'key' => env('GOOGLE_MAP_KEY'),
    ],

    'stripePayment' => [
        'publish_key' => env('STRIPE_PUBLISH_KEY'), 'pk_live_51OEZ1jGZlAy467TGW7OzHRdCOyYFbMaOzJrLtPMqIUAMSCQ6dPp8BSM4g0eE0n48W8HblvUodJqAoH8Sq27XtuVm00YLSMpTpv',
        'secret_key' => env('STRIPE_SECRET_KEY'), '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',
    ],

];
