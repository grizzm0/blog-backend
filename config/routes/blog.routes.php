<?php

/** @var Zend\Expressive\Application $app */

use Application\Validator\Uuid;
use Blog\Action;

$app->get('/blog/post', Action\PostListAction::class, 'blog::post-list');
$app->get('/blog/post/{id:' . Uuid::UUID4_REGEX . '}', Action\PostAction::class, 'blog::post');
