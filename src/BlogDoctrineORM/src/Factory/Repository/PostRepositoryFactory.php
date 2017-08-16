<?php

declare(strict_types=1);

namespace Blog\Doctrine\ORM\Factory\Repository;

use Blog\Entity\Post;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

/**
 * @package Blog\Doctrine\ORM\Factory\Repository
 */
final class PostRepositoryFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return \Doctrine\ORM\EntityRepository
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    public function __invoke(ContainerInterface $container)
    {
        return $container->get(EntityManager::class)->getRepository(Post::class);
    }
}
