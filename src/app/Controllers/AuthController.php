<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthController extends Controller
{
    public function register(Request $request, Response $response)
    {
        return $this->twig->render($response, "/authentication/register.twig", ["name" => "register", "form_url" => "/register/getForm"]);
    }

    public function registerForm(Request $request, Response $response)
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $username = $_POST["username"];
        if (!$this->userModel->create($email, $username, $password)) 
        {
            return $response->withHeader("location", "/register")->withStatus(302);
        }
        $response = $response->withHeader("location", "/login")->withStatus(302);
        return $response;
    }

    public function login(Request $request, Response $response)
    {
        return $this->twig->render($response, "/authentication/login.twig", ["name" => "login", "form_url" => "/login/getForm"]);
    }

    public function loginForm(Request $request, Response $response)
    {
        session_start();
        $user = $this->userModel->getUser($_POST["email"], $_POST["password"]);
        if (!$user)
        {
            return $response->withHeader("location", "/login")->withStatus(302);
        }
        $_SESSION["user_id"] = $user->getId();
        $response = $response->withHeader("location", "/")->withStatus(302);
        return $response;
    }

    public function logout(Request $request, Response $response)
    {
        if (!isset($_SESSION))
        {
            session_start();
        }
        $_SESSION = [];
        $response = $response->withHeader("location", "/login")->withStatus(302);
        return $response;
    }
}