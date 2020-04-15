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

    'default' => env('OFFICE_SUITE_DRIVER', 'office365'),

    'gsuite' => [
        'service_class_path' => 'App\OfficeSuites\GsuiteService',
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_CLIENT_CALLBACK'),
        'hd' => env('GOOGLE_HD', '*')
    ],

    'office365' => [
        'service_class_path' => 'App\OfficeSuites\Office365Service',
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    ]
];
