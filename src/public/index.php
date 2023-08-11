<?php

declare(strict_types=1);

use \DI\Bridge\Slim\Bridge;

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__ . "/../config/bootstrap.php";

$app = Bridge::create($container);

require __DIR__ . "/../app/routes.php";

$app->run();