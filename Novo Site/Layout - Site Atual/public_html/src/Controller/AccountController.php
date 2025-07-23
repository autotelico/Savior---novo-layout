<?php

namespace App\Controller;

use App\Helper\Feedback;
use App\Helper\ResponseHelper;
use App\Infra\Captcha\CaptchaService;
use App\Service\TemplateService;
use App\Infra\TokenGenerator;
use App\Infra\TokenValidator;
use App\Service\AccountService;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AccountController
{
    public function __construct(
        private TemplateService $view,
        private AccountService $accountService,
    ){}

    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $account = $this->accountService->getUserDataByLogin($_SESSION['login']);
        
        return $this->view->render($response, 'my-account', [
            "user" => $account
        ]);
    }

    public function registerIndex(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->view->render($response, 'register', [
        ]);
    }

    public function create(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();
            $serverParams = $request->getServerParams();

            if (!ENABLE_REGISTER) {
                throw new \UnexpectedValueException("A Criação de contas não está disponível no momento.");
            }

            //TODO LOG
            CaptchaService::validate($params['g-recaptcha-response']);
    
            $this->accountService->create($params, $serverParams);
            $message = ResponseHelper::success(Feedback::ACCOUNT_CREATED, true);
            $status = 201;
    
        } catch (\Throwable $th) {
            $message = ResponseHelper::success($th->getMessage(), false);
            $status = 400;
            
        } finally {
            $response->getBody()->write($message);
            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus($status);
        }
    }

    public function changePassword(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();
            $serverParams = $request->getServerParams();

            CaptchaService::validate($params['g-recaptcha-response']);

            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $this->accountService->confirmPassword($params);
            $this->accountService->changePassword($params);

            $message = ResponseHelper::success(Feedback::PASSWORD_CHANGED);
            $status = 200;

        } catch (\Throwable $th) {
            $message = ResponseHelper::success($th->getMessage(), false);
            $status = 400;

        } finally {
            $response->getBody()->write($message);
            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus($status);
        }
    }

    public function changeEmail(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();
            $serverParams = $request->getServerParams();

            CaptchaService::validate($params['g-recaptcha-response']);

            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $this->accountService->confirmPassword($params);
            $this->accountService->changeEmail($params);

            $message = ResponseHelper::success(Feedback::EMAIL_CHANGED);
            $status = 200;

        } catch (\Throwable $th) {
            $message = ResponseHelper::success($th->getMessage(), false);
            $status = 400;

        } finally {
            $response->getBody()->write($message);
            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus($status);
        }
    }

    public function socialId(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();
            $serverParams = $request->getServerParams();

            // CaptchaService::validate($params['g-recaptcha-response']);

            $this->accountService->confirmPassword($params);
            $socialId = $this->accountService->getSocialId();

            $message = ResponseHelper::success($socialId);
            $status = 200;

        } catch (\Throwable $th) {
            $message = ResponseHelper::success($th->getMessage(), false);
            $status = 400;

        } finally {
            $response->getBody()->write($message);
            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus($status);
        }
    }

    public function warehousePassword(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();
            $serverParams = $request->getServerParams();

            // CaptchaService::validate($params['g-recaptcha-response']);

            $this->accountService->confirmPassword($params);
            $warehousePass = $this->accountService->getWarehousePassword();

            $message = ResponseHelper::success($warehousePass);
            $status = 200;

        } catch (\Throwable $th) {
            $message = ResponseHelper::success($th->getMessage(), false);
            $status = 400;

        } finally {
            $response->getBody()->write($message);
            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus($status);
        
        }
    }
}