<?php

namespace App\Controller;

use App\Helper\Feedback;
use App\Helper\Flash;
use App\Helper\ResponseHelper;
use App\Service\AccountService;
use App\Infra\Captcha\CaptchaService;
use App\Service\TemplateService;
use App\Infra\TokenGenerator;
use App\Infra\TokenValidator;
use App\Infra\Auth\Authenticator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AuthController 
{
    public function __construct(
        private Authenticator $authenticator,
        private TemplateService $view,
        private AccountService $accountService
    ){}

    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->view->render($response, 'login', [
            'user' => $this->accountService->getUserDataByLogin($_SESSION['login']),
        ]);
    }

    public function login(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $params = $request->getParsedBody();
        // $serverParams = $request->getServerParams();
    
        try {
            //TODO log
            CaptchaService::validate($params['g-recaptcha-response']);

            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $this->authenticator->auth($params);

            Flash::setMsg(Feedback::LOGIN_SUCCESS->value, 'success');
            return $response
            ->withHeader('Location', '/my-account')
            ->withStatus(302);

        } catch (\Throwable $th) {
            Flash::setMsg($th->getMessage(), 'error');
            return $response
            ->withHeader('Location', '/login')
            ->withStatus(302);
        } 
    }

    public function logout(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        session_destroy();
        session_start();
        Flash::setMsg(Feedback::LOGOUT_SUCCESS->value);
        return $response->withHeader('Location', '/')->withStatus(302);
    }
}