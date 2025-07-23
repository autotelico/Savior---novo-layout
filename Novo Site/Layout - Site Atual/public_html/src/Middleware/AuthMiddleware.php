<?php

namespace App\Middleware;

use App\Helper\Feedback;
use App\Helper\Flash;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class AuthMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
            $response = new \Slim\Psr7\Response();
            
            Flash::setMsg(Feedback::LOGIN_REQUIRED->value, "error");

            return $response
            ->withHeader('Location', '/')
            ->withStatus(302);
        }

        $response = $handler->handle($request);
        return $response;
    }
}