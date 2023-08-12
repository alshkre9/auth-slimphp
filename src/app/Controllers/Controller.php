<?php

namespace App\Controllers;

use Slim\Views\Twig;
use App\Models\UserModel;

abstract class Controller
{
    protected Twig $twig;
    protected UserModel $userModel;

    public function __construct(Twig $twig, UserModel $userModel)
    {
        $this->twig = $twig;
        $this->userModel = $userModel;
    }
}