<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class LoginMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler)
    {
        $response = $handler->handle($request);
        if (!isset($_SESSION))
        {
            session_start();
        }
        if (!isset($_SESSION["user_id"]))
        {
            return $response->withHeader("location", "/login")->withStatus(302);
        }
        
        return $response;
    }
}