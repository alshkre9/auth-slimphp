<?php

namespace App;

use App\Controllers\HomeController;
use App\Controllers\AuthController;

$app->get("/", HomeController::class . ":index");
$app->get("/register", AuthController::class . ":register");
$app->post("/register/getForm", AuthController::class . ":getForm");
