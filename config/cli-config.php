<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\EntityManager;

chdir(dirname(__DIR__));

require __DIR__ . '/../vendor/autoload.php';

return ConsoleRunner::createHelperSet(
    (require __DIR__ . '/container.php')->get(EntityManager::class)
);
