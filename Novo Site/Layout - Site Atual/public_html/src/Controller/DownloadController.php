<?php

namespace App\Controller;

use App\Service\AccountService;
use App\Service\TemplateService;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class DownloadController
{
    public function __construct(
        private TemplateService $view,
        private AccountService $accountService
    ){}

    public function index(RequestInterface $request, ResponseInterface $response, array $queryParams): ResponseInterface
    {
        return $this->view->render($response, 'downloads', [
            'user'            => $this->accountService->getUserDataByLogin($_SESSION['login']),
        ]);
    }

}