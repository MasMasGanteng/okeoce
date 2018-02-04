<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1743681079059145',
        'client_secret' => '33d1a96a84c97d71ef2bf050d9fe2b54',
        'redirect' => 'http://localhost:8000/social-media/registered/facebook',
    ],

    'google' => [
         'client_id' => env('1067955128684-css1sofpblgl8us9sddq98btdckbbr.apps.googleusercontent.com'),
         'client_secret' => env('NHTgS98vMj6LCH5BQQz0b7'),
         'redirect' => env('http://localhost:8000/social-media/registered/google'),
     ],

];
