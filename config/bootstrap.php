<?php

chdir(dirname(__DIR__));
require __DIR__  . '/../vendor/autoload.php';

$dotEnv = __DIR__ . '/../.env';

if (file_exists($dotEnv)) {
    (new \Symfony\Component\Dotenv\Dotenv())->load($dotEnv);
}
