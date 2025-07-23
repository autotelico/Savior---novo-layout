<?php

namespace App\Controller\Admin;

use App\Helper\Flash;
use App\Infra\Auth\Authenticator;
use App\Infra\Captcha\CaptchaService;
use App\Service\TemplateService;
use App\Infra\TokenGenerator;
use App\Infra\TokenValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AuthController
{
    public function __construct(
        private TemplateService $view,
        private Authenticator $authenticator
    ){}

    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->view->render($response, 'admin/login');
    }

    public function login(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $params = $request->getParsedBody();

        try {
            CaptchaService::validate($params['g-recaptcha-response']);

            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $this->authenticator->auth($params);

            return $response
            ->withHeader('Location', '/admin/dashboard')
            ->withStatus(302);

        } catch (\Throwable $th) {
           Flash::setMsg($th->getMessage(), 'error');

           return $response
            ->withHeader('Location', '/admin/login')
            ->withStatus(302);
        } 
    }
}