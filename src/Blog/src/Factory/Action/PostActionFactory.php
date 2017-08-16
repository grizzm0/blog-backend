<?php

declare(strict_types=1);

namespace Blog\Factory\Action;

use Blog\Action\PostAction;
use Blog\Repository\PostRepositoryInterface;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Hal\HalResponseFactory;
use Zend\Expressive\Hal\ResourceGenerator;

/**
 * @package Blog\Factory\Action
 */
final class PostActionFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return PostAction
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    public function __invoke(ContainerInterface $container)
    {
        return new PostAction(
            $container->get(ResourceGenerator::class),
            $container->get(HalResponseFactory::class),
            $container->get(PostRepositoryInterface::class)
        );
    }
}
