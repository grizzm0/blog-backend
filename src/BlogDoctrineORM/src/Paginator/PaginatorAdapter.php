<?php

declare(strict_types=1);

namespace Blog\Doctrine\ORM\Paginator;

use Core\Paginator\PaginatorInterface;
use Zend\Paginator\Adapter\AdapterInterface;

final class PaginatorAdapter implements AdapterInterface
{
    /**
     * @var PaginatorInterface
     */
    private $repository;

    /**
     * DoctrinePaginatorAdapter constructor.
     *
     * @param PaginatorInterface $repository
     */
    public function __construct(PaginatorInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function getItems($offset, $itemCountPerPage): array
    {
        return $this->repository->findItems($itemCountPerPage, $offset);
    }

    /**
     * {@inheritdoc}
     */
    public function count(): int
    {
        return $this->repository->count();
    }
}
