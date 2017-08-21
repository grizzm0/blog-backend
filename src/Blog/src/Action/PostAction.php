<?php

declare(strict_types=1);

namespace Blog\Action;

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
final class PostAction implements MiddlewareInterface
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
     * PostAction constructor.
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
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate): ResponseInterface
    {
        $id = $request->getAttribute('id');

        if ($id === null) {
            throw new \RuntimeException('No post identifier provided', 400);
        }

        $post = $this->repository->findPostById($id);

        if ($post === null) {
            throw new \RuntimeException('Post not found', 404);
        }

        $resource = $this->resourceGenerator->fromObject(
            $post,
            $request
        );

        return $this->responseFactory->createResponse($request, $resource);
    }
}
