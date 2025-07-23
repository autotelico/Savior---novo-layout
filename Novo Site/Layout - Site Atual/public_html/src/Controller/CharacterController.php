<?php

namespace App\Controller;

use App\Helper\Feedback;
use App\Helper\Flash;
use App\Infra\TokenGenerator;
use App\Infra\TokenValidator;
use App\Service\AccountService;
use App\Service\CharacterService;
use App\Service\TemplateService;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class CharacterController
{
    public function __construct(
        private TemplateService $view,
        private AccountService $accountService,
        private CharacterService $characterService
    ){}

    public function indexUnstuck(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->view->render($response, 'unstuck-char', [
            'user'       => $this->accountService->getUserDataByLogin($_SESSION['login']),
            'characters' => $this->characterService->listUserCharacters($_SESSION['login'])
        ]);
    }

    public function unstuck(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();
            $serverParams = $request->getServerParams();

            // CaptchaService::validate($params['g-recaptcha-response']);

            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $this->characterService->unstuckCharacter($params);

            Flash::setMsg(Feedback::SUCCESS->value, "success");
            return $response
            ->withHeader('Location', '/unstuck-char')
            ->withStatus(302);

        } catch (\Throwable $th) {
            Flash::setMsg($th->getMessage(), 'error');
            return $response
            ->withHeader('Location', '/unstuck-char')
            ->withStatus(302);
        } 
    }
}