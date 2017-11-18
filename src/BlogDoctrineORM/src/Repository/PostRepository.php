<?php

declare(strict_types=1);

namespace Blog\Doctrine\ORM\Repository;

use Blog\Doctrine\ORM\Paginator\PaginatorAdapter;
use Blog\Entity\Post;
use Blog\Repository\PostRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Zend\Paginator\Adapter\AdapterInterface;

/**
 * @method Post find($id, $lockMode = null, $lockVersion = null)
 */
final class PostRepository extends EntityRepository implements PostRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function findPostById(string $id): ?Post
    {
        return $this->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function findPosts(int $limit, int $offset): array
    {
        return parent::findBy([], ['created' => 'DESC'], $limit, $offset);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Doctrine\ORM\ORMInvalidArgumentException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Post $post): void
    {
        $this->_em->persist($post);
        $this->_em->flush();
    }

    ################################################################
    ###################### PaginatorInterface ######################
    ################################################################

    /**
     * {@inheritdoc}
     */
    public function getPaginatorAdapter(): AdapterInterface
    {
        return new PaginatorAdapter($this);
    }

    /**
     * {@inheritdoc}
     */
    public function findItems(int $limit, int $offset): array
    {
        return $this->findPosts($limit, $offset);
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Doctrine\ORM\NoResultException
     */
    public function count(): int
    {
        $builder = $this->createQueryBuilder('p');
        $builder->select('COUNT(p)');

        return $builder->getQuery()->getSingleScalarResult();
    }
}
