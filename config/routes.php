<?php
/** @var Zend\Expressive\Application $app */

$app->get('/ping', App\Action\PingAction::class, 'api.ping');
