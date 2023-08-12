<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request, Response $response)
    {
        return $this->twig->render($response, "authentication.html");
    }
    public function getForm(Request $request, Response $response)
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $this->userModel->create($email, $password);
        return $response->withHeader("location", "/register")->withStatus(302);
    }
}