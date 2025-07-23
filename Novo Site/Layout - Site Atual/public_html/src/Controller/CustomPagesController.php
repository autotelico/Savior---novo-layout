<?php

namespace App\Controller;

use App\Repository\CustomPagesRepository;
use App\Service\AccountService;
use App\Service\TemplateService;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class CustomPagesController
{
    public function __construct(
        private TemplateService $view,
        private CustomPagesRepository $customPagesRepository,
        private AccountService $accountService
    ){}

    public function tos(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $content = $this->customPagesRepository->getAll();
        return $this->view->render($response, 'article', [
            'user'            => $this->accountService->getUserDataByLogin($_SESSION['login']),
            'post' => [
                'title' => 'Termos de Uso',
                'content' => $content[0]['content']
            ]
        ]);
    }

    public function pop(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $content = $this->customPagesRepository->getAll();
        return $this->view->render($response, 'article', [
            'user'            => $this->accountService->getUserDataByLogin($_SESSION['login']),
            'post' => [
                'title' => 'Políticas de Privacidade',
                'content' => $content[1]['content']
            ]
        ]);
    }

    public function about(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $content = $this->customPagesRepository->getAll();
        return $this->view->render($response, 'article', [
            'user'            => $this->accountService->getUserDataByLogin($_SESSION['login']),
            'post' => [
                'title' => 'Apresentação do Servidor',
                'content' => $content[2]['content']
            ]
        ]);
    }
}