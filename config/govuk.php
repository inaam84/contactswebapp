<?php

return [
    'forms' => [
        //
    ],

    'header' => [
        'links' => [],
        'logo' => [
            'alt' => 'GOV.UK',
            'asset' => 'images/govuk.jpg',
            'height' => 30,
            'width' => 148,
        ],
        'route' => 'home',
        'service_name' => env('APP_NAME'),
    ],

    'home' => [
        'label' => 'Dashboard',
        'route' => 'dashboard',
    ],

    'parts' => [
        'laracasts_flash' => false,
        '404lab_impersonate' => false,
    ],
];
