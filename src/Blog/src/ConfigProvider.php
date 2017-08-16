<?php

declare(strict_types=1);

namespace Blog;

use Blog\Collection\PostCollection;
use Blog\Entity\Post;
use Zend\Expressive\Hal\Metadata\MetadataMap;
use Zend\Expressive\Hal\Metadata\RouteBasedCollectionMetadata;
use Zend\Expressive\Hal\Metadata\RouteBasedResourceMetadata;
use Zend\Hydrator\ClassMethods;

/**
 * @package Blog
 */
class ConfigProvider
{
    /**
     * @return array
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            MetadataMap::class => [
                [
                    '__class__' => RouteBasedResourceMetadata::class,
                    'resource_class' => Post::class,
                    'route' => 'blog.post',
                    'extractor' => ClassMethods::class,
                ],
                [
                    '__class__' => RouteBasedCollectionMetadata::class,
                    'collection_class' => PostCollection::class,
                    'collection_relation' => 'blog.post',
                    'route' => 'blog.post.list',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            'factories' => [
                Action\PostAction::class     => Factory\Action\PostActionFactory::class,
                Action\PostListAction::class => Factory\Action\PostListActionFactory::class,
            ],
        ];
    }
}
