<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class HomeController
{
    private Twig $twig;
    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }
    
    public function index(Request $request, Response $response)
    {
        $view = $this->twig->render($response, "index.html", ["name" => "index"]);
        return $view;
    }
}