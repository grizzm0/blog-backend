<?php

use Zend\ConfigAggregator\ConfigAggregator;
use Zend\Expressive\Application;
use Zend\Expressive\Container;
use Zend\Expressive\Delegate;
use Zend\Expressive\Helper;
use Zend\Expressive\Middleware;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Stratigility\Middleware\ErrorHandler;

return [
    // Toggle the configuration cache. Set this to boolean false, or remove the
    // directive, to disable configuration caching. Toggling development mode
    // will also disable it by default; clear the configuration cache using
    // `composer clear-config-cache`.
    ConfigAggregator::ENABLE_CACHE => true,

    // Enable debugging; typically used to provide debugging information within templates.
    'debug' => false,

    'dependencies' => [
        'aliases' => [
            'Zend\Delegate\DefaultDelegate' => Delegate\NotFoundDelegate::class,
        ],
        'factories'  => [
            Application::class                       => Container\ApplicationFactory::class,
            ErrorHandler::class                      => Container\ErrorHandlerFactory::class,
            Delegate\NotFoundDelegate::class         => Container\NotFoundDelegateFactory::class,
            Helper\UrlHelper::class                  => Helper\UrlHelperFactory::class,
            Helper\UrlHelperMiddleware::class        => Helper\UrlHelperMiddlewareFactory::class,
            Middleware\ErrorResponseGenerator::class => Container\ErrorResponseGeneratorFactory::class,
            Middleware\NotFoundHandler::class        => Container\NotFoundHandlerFactory::class,
        ],
    ],

    'zend-expressive' => [
        // Enable programmatic pipeline: Any `middleware_pipeline` or `routes`
        // configuration will be ignored when creating the `Application` instance.
        'programmatic_pipeline' => true,

        // Provide templates for the error handling middleware to use when
        // generating responses.
        'error_handler' => [
            'template_404'   => 'error::404',
            'template_error' => 'error::error',
        ],
    ],
];
