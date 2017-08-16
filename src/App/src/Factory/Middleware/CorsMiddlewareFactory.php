<?php

declare(strict_types=1);

namespace App\Factory\Middleware;

use Psr\Container\ContainerInterface;
use Tuupola\Middleware\Cors;

/**
 * @package App\Factory\Middleware
 */
final class CorsMiddlewareFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return Cors
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    public function __invoke(ContainerInterface $container)
    {
        return new Cors(
            $container->get('config')['cors'] ?? []
        );
    }
}
