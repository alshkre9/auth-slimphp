<?php

use App\Controllers\MainController;
use App\Controllers\AuthController;
use App\Middleware\AuthMiddleware;

$app->group("", function($app)
{
    $app->get("/", MainController::class . ":index");
}
)->add(new AuthMiddleware);
$app->get("/register", AuthController::class . ":register");
$app->post("/register/getForm", AuthController::class . ":registerForm");
$app->get("/login", AuthController::class . ":login");
$app->post("/login/getForm", AuthController::class . ":loginForm");
$app->get("/logout", AuthController::class . ":logout");
