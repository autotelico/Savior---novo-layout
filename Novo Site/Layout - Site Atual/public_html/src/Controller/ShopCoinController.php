<?php

namespace App\Controller;

use App\Service\AccountService;
use App\Service\Shop\CoinService;
use App\Service\TemplateService;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ShopCoinController
{
    public function __construct(
        private TemplateService $view,
        private CoinService $coinService,
        private AccountService $accountService
    ){}

    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->view->render($response, 'shop-coin', [
            'coinsPack' => $this->coinService->list(),
            'user' => $this->accountService->getUserDataByLogin($_SESSION['login'])
        ]);
    }
}