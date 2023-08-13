<?php

use DI\Container;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

return new Container(require __DIR__ . "/settings.php");