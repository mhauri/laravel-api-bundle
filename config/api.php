<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Default API Version
    |--------------------------------------------------------------------------
    |
    | This is the default version when generating your APIs documentation.
    |
    */
    'version' => env('API_VERSION', '0.0.1'),

    /*
    |--------------------------------------------------------------------------
    | Default API Prefix
    |--------------------------------------------------------------------------
    |
    | A default prefix to use for your API routes so you don't have to
    | specify it for each group.
    |
    */
    'prefix' => env('API_PREFIX', 'v1'),

    /*
    |--------------------------------------------------------------------------
    | Name
    |--------------------------------------------------------------------------
    |
    | When generating the documentation this name will be used
    |
    */
    'name' => env('API_NAME', 'API'),

    /*
    |--------------------------------------------------------------------------
    | E-Mail Contact
    |--------------------------------------------------------------------------
    |
    | When generating the documentation this e-mail will be used as contact
    |
    */
    'contact' => env('API_EMAIL', 'hello@example.com'),

    /*
    |--------------------------------------------------------------------------
    | Throttling / Rate Limiting
    |--------------------------------------------------------------------------
    |
    | Consumers of your API can be limited to the amount of requests they can
    | make.
    |
    */
    'rate_limit' => env('API_RATE_LIMIT', '60'),

    /*
    |--------------------------------------------------------------------------
    | Security
    |--------------------------------------------------------------------------
    |
    | Security Schema
    |
    */
    'security' => [
        'scheme' => env('API_SECURITY_SCHEME', 'bearer'),
        'name' => env('API_SECURITY_NAME', 'Authentication'),
        'description' => env('API_SECURITY_DESCRIPTION', 'Value: Bearer {jwt}'),
        'type' => env('API_SECURITY_SCHEME', 'apiKey'),
        'in' => env('API_SECURITY_SCHEME', 'header'),
    ],
];
