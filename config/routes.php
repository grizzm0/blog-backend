<?php
/** @var Zend\Expressive\Application $app */

$uuid4 = '[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}';

$app->get('/ping', App\Action\PingAction::class, 'ping');
$app->get('/blog/post', Blog\Action\PostListAction::class, 'blog.post.list');
$app->get('/blog/post/{id:'. $uuid4 .'}', Blog\Action\PostAction::class, 'blog.post');
