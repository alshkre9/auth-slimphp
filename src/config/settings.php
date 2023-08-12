<?php


use Slim\Views\Twig;
use DI\Container;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

return [
    EntityManager::class => function(Container $c)
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: array(__DIR__ . "/../app/Entities"),
            isDevMode: true,
        );

        $connection = DriverManager::getConnection([
            "driver" => "pdo_mysql",
            "dbname" => "main",
            "user" => "root",
            "password" => "root",
            "host" => "db"
        ], $config);

        return new EntityManager($connection, $config);
    },
    Twig::class => function(Container $c)
    {
        return Twig::create(__DIR__ . "/../views/");
    }
];