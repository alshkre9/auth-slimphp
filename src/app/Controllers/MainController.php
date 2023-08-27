<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Controller;

class MainController extends Controller
{
    public function index(Request $request, Response $response)
    {
        if (!isset($_SESSION))
        {
            session_start();
        }
        if (!array_key_exists("user_id", $_SESSION))
        {
        return $this->twig->render($response, "/main/home.twig");
        }
        return $this->twig->render($response, "/main/home.twig", ["user" => $this->userModel->get($_SESSION["user_id"])]);
    }
}