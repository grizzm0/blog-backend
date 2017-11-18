<?php

/** @var Zend\Expressive\Application $app */

use Application\Action;

$app->get('/ping', Action\PingAction::class, 'application::ping');
