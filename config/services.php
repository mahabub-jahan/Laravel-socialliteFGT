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

    'google' => [
        'client_id' => '708302642742-8b7rh36012h06s0tc0n5h0lc943i67go.apps.googleusercontent.com',
        'client_secret' => 'tKqVvgBEYy8tvuKHhTvW37xz',
        'redirect' => 'http://sociallitefgt.com/login/google/callback',
    ],

    'facebook' => [
        'client_id' => '899046033593808',
        'client_secret' => '43996364c542e93f3805d9cb14b7220a',
        'redirect' => 'http://sociallitefgt.com/login/facebook/callback',
    ],

    'twitter' => [
        'client_id' => 'synEvzlBCLGiKMz7VU1SJdo74',
        'client_secret' => 'yGtUQcE7x1xlXSbwmqQmDp5I9Hhyor6U0Nh556QoNXwuh93oxy',
        'redirect' => 'http://sociallitefgt.com/login/twitter/callback',
    ],

];
