<?php

use ContainerInteropDoctrine\EntityManagerFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\XmlDriver;

return [
    'dependencies' => [
        'aliases' => [
            EntityManager::class => 'doctrine.entity_manager.orm_default',
        ],
        'factories' => [
            'doctrine.entity_manager.orm_default' => EntityManagerFactory::class,
        ],
    ],
    'doctrine' => [
        'driver' => [
            'orm_default' => [
                'class' => XmlDriver::class,
                'cache' => 'array',
                'paths' => './config/doctrine',
            ],
        ],
    ],
];
