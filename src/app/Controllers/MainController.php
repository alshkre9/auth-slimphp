<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Controller;

class MainController extends Controller
{
    public function index(Request $request, Response $response)
    {
        session_start();
        if (!$_SESSION)
        {
            return $response->withHeader("location", "/login")->withStatus(302);
        }
        return $this->twig->render($response, "home.html", ["user_id" => $_SESSION["user_id"]]);
    }
}