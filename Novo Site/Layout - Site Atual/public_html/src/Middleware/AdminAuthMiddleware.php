<?php

namespace App\Middleware;

use App\Helper\Feedback;
use App\Helper\Flash;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class AdminAuthMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler, ): Response
    {
        if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
            $response = new \Slim\Psr7\Response();
            Flash::setMsg(Feedback::LOGIN_REQUIRED->value, "error");

            return $response
            ->withHeader('Location', '/admin/login')
            ->withStatus(302);

        }
        
        $response = $handler->handle($request);

        //Existe a Possibilidade de buscar o usuário no banco de dados para remover acesso de forma instantânea.
        //a abordagem atual diminui a conexão com banco de dados.
        if ($_SESSION['admin'] !== true) {
            Flash::setMsg(Feedback::UNAUTHORIZED_ACCESS->value, "error");

            return $response
            ->withHeader('Location', '/admin/login')
            ->withStatus(302);
        }

        return $response;
    }
}