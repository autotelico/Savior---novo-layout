<?php

namespace App\Controller;

use App\Helper\Feedback;
use App\Helper\Flash;
use App\Service\API\WebhookService;
use App\Infra\TokenGenerator;
use App\Infra\TokenValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Response;

class WebhookController
{
    public function __construct(
        private WebhookService  $webhookService,
    ){}

    public function manual(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();
            $serverParams = $request->getServerParams();
            
            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $this->webhookService->handleManual($params);

            Flash::setMsg(Feedback::SUCCESS->value);


            return $response
            ->withHeader('Location', "/admin/dashboard")
            ->withStatus(302);

        } catch (\Throwable $th) {
            Flash::setMsg($th->getMessage(), 'error');

            return $response
             ->withHeader('Location', "/admin/dashboard")
             ->withStatus(302);
        }
    }

    public function pix(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();
            $serverParams = $request->getServerParams();

            $this->webhookService->handlePix($params);
            
        } catch (\Throwable $th) {
            error_log($th->getMessage());
        } finally {
            //todo status e mensagem de sucesso?
            return new Response();
        }

    }

    public function paypal(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();
            $serverParams = $request->getServerParams();

            $this->webhookService->handlePaypal($params);
            
        } catch (\Throwable $th) {
            error_log($th->getMessage());
        } finally {
            //todo status e mensagem de sucesso?
            return new Response();
        }
    }

}