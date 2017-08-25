<?php

require __DIR__ . '/bootstrap.php';

$container     = require __DIR__ . '/container.php';
$entityManager = $container->get(\Doctrine\ORM\EntityManager::class);

$helperSet = new \Symfony\Component\Console\Helper\HelperSet([
    'db'     => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($entityManager->getConnection()),
    'em'     => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($entityManager),
    'dialog' => new \Symfony\Component\Console\Helper\QuestionHelper(),
]);

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createApplication($helperSet,[
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\DiffCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\ExecuteCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\GenerateCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\MigrateCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\StatusCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\VersionCommand(),
])->run();
