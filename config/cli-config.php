<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\EntityManager;

require __DIR__ . '/bootstrap.php';

return ConsoleRunner::createHelperSet(
    (require __DIR__ . '/container.php')->get(EntityManager::class)
);
