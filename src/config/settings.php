<?php

use Slim\Views\Twig;
use DI\Container;

return [
    Twig::class => function(Container $c)
    {
        return Twig::create(__DIR__ . "/../views/");
    }
];