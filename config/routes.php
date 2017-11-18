<?php
/** @var Zend\Expressive\Application $app */

use Application\Validator\Uuid;

$app->get('/ping', Application\Action\PingAction::class, 'ping');
$app->get('/blog/post', Blog\Action\PostListAction::class, 'blog.post.list');
$app->get('/blog/post/{id:' . Uuid::UUID4_REGEX . '}', Blog\Action\PostAction::class, 'blog.post');
