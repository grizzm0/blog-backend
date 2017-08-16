<?php

use ContainerInteropDoctrine\EntityManagerFactory;
use Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain;
use Doctrine\ORM\EntityManager;

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
        'connection' => [
            'orm_default' => [
                'params' => [
                    'url' => getenv('DB_DSN'),
                ],
            ],
        ],
        'driver' => [
            'orm_default' => [
                'class' => MappingDriverChain::class,
            ],
        ],
    ],
];
