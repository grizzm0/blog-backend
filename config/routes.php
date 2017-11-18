<?php
/** @var Zend\Expressive\Application $app */

use App\Validator\Uuid;

$app->get('/ping', App\Action\PingAction::class, 'ping');
$app->get('/blog/post', Blog\Action\PostListAction::class, 'blog.post.list');
$app->get('/blog/post/{id:' . Uuid::UUID4_REGEX . '}', Blog\Action\PostAction::class, 'blog.post');
