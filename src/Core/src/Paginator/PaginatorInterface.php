<?php

declare(strict_types=1);

namespace Core\Paginator;

use Blog\Entity\Post;
use Zend\Paginator\Adapter\AdapterInterface;

interface PaginatorInterface
{
    /**
     * @return AdapterInterface
     */
    public function getPaginatorAdapter(): AdapterInterface;

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return Post[]
     */
    public function findItems(int $limit, int $offset): array;

    /**
     * @return int
     */
    public function count(): int;
}
