<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request, Response $response)
    {
        return $this->twig->render($response, "home.html");
    }
}