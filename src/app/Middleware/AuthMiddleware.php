<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class AuthMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler)
    {
        $response = $handler->handle($request);
        if (!isset($_SESSION))
        {
            session_start();
        }
        if (!$_SESSION)
        {
            return $response->withHeader("location", "/login")->withStatus(302);
        }
        return $response;
    }
}