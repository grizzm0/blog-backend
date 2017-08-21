<?php

declare(strict_types=1);

namespace Blog\Repository;

use Blog\Entity\Post;
use Core\Paginator\PaginatorInterface;

/**
 * Interface PostRepositoryInterface
 * @package Blog\Repository
 */
interface PostRepositoryInterface extends PaginatorInterface
{
    /**
     * @param string $id
     *
     * @return Post|null
     */
    public function findPostById(string $id): ?Post;

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return Post[]
     */
    public function findPosts(int $limit, int $offset): array;

    /**
     * @param Post $post
     */
    public function save(Post $post): void;
}
