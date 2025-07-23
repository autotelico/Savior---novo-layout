<?php

namespace App\Controller\Admin;

use App\Helper\Feedback;
use App\Helper\Flash;
use App\Service\Shop\CoinReward;
use App\Service\Shop\CoinService;
use App\Service\TemplateService;
use App\Infra\TokenGenerator;
use App\Infra\TokenValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ShopCoinsController
{
    public function __construct(
        private TemplateService $view,
        private CoinService $coinService,
        private CoinReward $shopCoinsRewardService
    ){}

    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->view->render($response, 'admin/shop-coins', [
            'list'       => $this->coinService->list(),
            'listReward' => $this->shopCoinsRewardService->list()
        ]);
    }

    public function create(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();

            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $this->coinService->create($params);

            Flash::setMsg(Feedback::SUCCESS->value);

            return $response
            ->withHeader('Location', '/admin/shop-coins')
            ->withStatus(302);

        } catch (\Throwable $th) {
           Flash::setMsg($th->getMessage(), 'error');

           return $response
            ->withHeader('Location', '/admin/shop-coins')
            ->withStatus(302);
        } 
    }

    public function delete(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();

            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $this->coinService->delete($params);

            Flash::setMsg(Feedback::SUCCESS->value);

            return $response
            ->withHeader('Location', '/admin/shop-coins')
            ->withStatus(302);

        } catch (\Throwable $th) {
           Flash::setMsg($th->getMessage(), 'error');

           return $response
            ->withHeader('Location', '/admin/shop-coins')
            ->withStatus(302);
        } 
    }
}