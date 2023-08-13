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
        return $this->twig->render($response, "/authentication/register.html", ["name" => "register", "form_url" => "/register/getForm"]);
    }

    public function registerForm(Request $request, Response $response)
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $username = $_POST["username"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8 || !$username) 
        {
            return $response->withHeader("location", "/register")->withStatus(302);
        }
        $this->userModel->create($email, $username, $password);
        return $response->withHeader("location", "/register")->withStatus(302);
    }

    public function login(Request $request, Response $response)
    {
        return $this->twig->render($response, "/authentication/login.html", ["name" => "login", "form_url" => "/login/getForm"]);
    }

    public function loginForm(Request $request, Response $response)
    {
        session_start();
        $user = $this->userModel->get($_POST["email"], $_POST["password"]);
        if (!$user)
        {
            return $response->withHeader("location", "/login")->withStatus(302);
        }
        $_SESSION["user_id"] = $user->getId();
        return $response->withHeader("location", "/")->withStatus(302);
    }

    public function logout(Request $request, Response $response)
    {
        session_start();
        if (isset($_SESSION))
        {
            session_destroy();
        }
        return $response->withHeader("location", "/login")->withStatus(302);
    }
}