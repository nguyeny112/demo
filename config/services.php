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
    'client_id' => '1886558448255498',
    'client_secret' => 'fcd496a7dfebb0de89e2599ca45c54aa',
    'redirect' => 'http://smpshop.herokuapp.com/callback',
    ],
    'google' => [
    'client_id' => '316752992233-hhqiq1r23816kosgcc64d8jdplhf9h7d.apps.googleusercontent.com',
    'client_secret' => '_NhqSxrm60vvUN-uehdyQFO9',
    'redirect' => 'http://smpshop.herokuapp.com/callback/google',
],

    ];
