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

    'stripe' => [
        'client' => env('STRIPE_CLIENT', 'sk_test_51OUSfiDRerNAbmX3AUF207ktP9pjbcN7Gpghnpz0yjt7T40OY1UCKkZecyYnMn0q8X05hz4iHAmHSQKxDS8KrYWf00Dfdf5eIS'),
        'public' => env('STRIPE_PUBLIC', 'sk_test_51OUSfiDRerNAbmX3AUF207ktP9pjbcN7Gpghnpz0yjt7T40OY1UCKkZecyYnMn0q8X05hz4iHAmHSQKxDS8KrYWf00Dfdf5eIS'),
        'webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),
        'prices_cache_ttl' => env('PRICES_TTL', 600),
        'prod_cache_ttl' => env('PRODUCTS_TTL', 600),
    ],

];
