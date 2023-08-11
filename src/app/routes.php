<?php

namespace App;

use App\Controllers\HomeController;

$app->get("/", HomeController::class . ":index");
