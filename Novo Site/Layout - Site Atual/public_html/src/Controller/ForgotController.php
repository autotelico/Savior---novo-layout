<?php

namespace App\Controller;

use App\Entity\Post\Link;
use App\Helper\Feedback;
use App\Helper\Flash;
use App\Service\AccountService;
use App\Infra\Captcha\CaptchaService;
use App\Service\ForgotService;
use App\Service\TemplateService;
use App\Infra\TokenGenerator;
use App\Infra\TokenValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Exception\HttpNotFoundException;

class ForgotController 
{
    public function __construct(
        private AccountService $accountService,
        private TemplateService $view,
        private ForgotService $forgotService
    ){}

    public function indexForgot(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->view->render($response, 'forgot', [
            'user' => $this->accountService->getUserDataByLogin($_SESSION['login']),
        ]);
    }

    public function indexForgotPassword(RequestInterface $request, ResponseInterface $response, array $queryParams): ResponseInterface
    {   
        try {
            $code = $this->forgotService->validateCode($queryParams['code']);
            $forgot = $this->forgotService->getForgotDataByCode($code);
            $this->forgotService->checkForgotCodeIsAvailable($forgot);

        } catch (\InvalidArgumentException | \UnexpectedValueException $th) {
            throw new HttpNotFoundException($request);
        } 

        return $this->view->render($response, 'forgot-change-password', [
            'user' => $this->accountService->getUserDataByLogin($_SESSION['login']),
            'code' => $code
        ]);
    }

    public function changePassword(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();
            $serverParams = $request->getServerParams();

            $code = $params['code'];

            CaptchaService::validate($params['g-recaptcha-response']);

            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $this->forgotService->changePassword($params);
            
            Flash::setMsg(Feedback::PASSWORD_CHANGED->value, 'success');

            return $response
            ->withHeader('Location', '/login')
            ->withStatus(302);

        } catch (\Throwable $th) {
            Flash::setMsg($th->getMessage(), 'error');
            
            return $response
            ->withHeader('Location', "/forgot/password/$code")
            ->withStatus(302);
        } 
    }

    public function forgotLogin(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();
            $serverParams = $request->getServerParams();

            CaptchaService::validate($params['g-recaptcha-response']);

            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $this->forgotService->forgotLogin($params);

            Flash::setMsg(Feedback::EMAIL_SENT->value, 'success');

            return $response
            ->withHeader('Location', '/forgot')
            ->withStatus(302);

        } catch (\Throwable $th) {
            Flash::setMsg($th->getMessage(), 'error');
            return $response
            ->withHeader('Location', '/forgot')
            ->withStatus(302);
        } 
    }

    public function forgotPassword(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();
            $serverParams = $request->getServerParams();

            CaptchaService::validate($params['g-recaptcha-response']);

            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $this->forgotService->forgotPassword($params);

            Flash::setMsg(Feedback::EMAIL_SENT->value, 'success');

            return $response
            ->withHeader('Location', '/forgot')
            ->withStatus(302);

        } catch (\Throwable $th) {
            Flash::setMsg($th->getMessage(), 'error');
            return $response
            ->withHeader('Location', '/forgot')
            ->withStatus(302);
        } 
    }
}