<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use Doctrine\ORM\EntityManager;

require __DIR__ . "/../vendor/autoload.php";
$container = require __DIR__ . '/../config/bootstrap.php';

$entityManager = $container->get(EntityManager::class);

ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);