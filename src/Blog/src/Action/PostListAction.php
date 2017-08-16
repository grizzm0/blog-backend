<?php

declare(strict_types=1);

namespace Blog\Action;

use Blog\Collection\PostCollection;
use Blog\Repository\PostRepositoryInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Hal\HalResponseFactory;
use Zend\Expressive\Hal\ResourceGenerator;

/**
 * @package Blog\Action
 */
final class PostListAction implements MiddlewareInterface
{
    /**
     * @var ResourceGenerator
     */
    private $resourceGenerator;

    /**
     * @var HalResponseFactory
     */
    private $responseFactory;

    /**
     * @var PostRepositoryInterface
     */
    private $repository;

    /**
     * PostListAction constructor.
     *
     * @param ResourceGenerator       $resourceGenerator
     * @param HalResponseFactory      $responseFactory
     * @param PostRepositoryInterface $repository
     */
    public function __construct(
        ResourceGenerator $resourceGenerator,
        HalResponseFactory $responseFactory,
        PostRepositoryInterface $repository
    ) {
        $this->resourceGenerator = $resourceGenerator;
        $this->responseFactory = $responseFactory;
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     * @throws \Zend\Paginator\Exception\InvalidArgumentException
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate): ResponseInterface
    {
        $page = $request->getQueryParams()['page'] ?? 1;

        $posts = new PostCollection($this->repository->getPaginatorAdapter());
        $posts->setItemCountPerPage(PostCollection::PER_PAGE);
        $posts->setCurrentPageNumber($page);

        $resource = $this->resourceGenerator->fromObject($posts, $request);

        return $this->responseFactory->createResponse($request, $resource);
    }
}
