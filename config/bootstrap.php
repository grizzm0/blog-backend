<?php

chdir(dirname(__DIR__));
require __DIR__  . '/../vendor/autoload.php';

(new \Symfony\Component\Dotenv\Dotenv())->load(__DIR__ . '/../.env');
