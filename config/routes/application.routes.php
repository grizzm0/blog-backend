<?php

/** @var Zend\Expressive\Application $app */

$app->get(
    '/ping',
    Application\Action\PingAction::class,
    'ping'
);
