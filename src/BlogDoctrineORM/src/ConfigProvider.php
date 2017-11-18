<?php

declare(strict_types=1);

namespace Blog\Doctrine\ORM;

use Blog\Doctrine\ORM\Factory\Repository\PostRepositoryFactory;
use Blog\Repository\PostRepositoryInterface;
use Doctrine\ORM\Mapping\Driver\XmlDriver;

class ConfigProvider
{
    /**
     * @return array
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'doctrine' => [
                'driver' => [
                    'orm_default' => [
                        'drivers' => [
                            'Blog\Entity' =>  __NAMESPACE__ . '_Driver',
                        ],
                    ],
                    __NAMESPACE__ . '_Driver' => [
                        'class' => XmlDriver::class,
                        'cache' => 'array',
                        'paths' => [
                            __DIR__ . '/../config/doctrine',
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            'factories' => [
                PostRepositoryInterface::class => PostRepositoryFactory::class,
            ],
        ];
    }
}
