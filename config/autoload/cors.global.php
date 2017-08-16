<?php

use App\Factory\Middleware\CorsMiddlewareFactory;
use Tuupola\Middleware\Cors;

return [
    'cors' => [
        'origin' => [
            getenv('CORS_ORIGIN'),
        ],
        'methods' => [
            'GET',
            'POST',
            'PUT',
            'PATCH',
            'DELETE',
        ],
    ],

    'dependencies' => [
        'factories' => [
            Cors::class => CorsMiddlewareFactory::class,
        ],
    ],
];
