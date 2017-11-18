<?php

declare(strict_types=1);

namespace Blog\Factory\Action;

use Blog\Action\PostListAction;
use Blog\Repository\PostRepositoryInterface;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Hal\HalResponseFactory;
use Zend\Expressive\Hal\ResourceGenerator;

final class PostListActionFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return PostListAction
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    public function __invoke(ContainerInterface $container)
    {
        return new PostListAction(
            $container->get(ResourceGenerator::class),
            $container->get(HalResponseFactory::class),
            $container->get(PostRepositoryInterface::class)
        );
    }
}
