<?php

namespace App\Controller\Admin;

use App\Helper\Feedback;
use App\Helper\Flash;
use App\Service\Shop\CoinReward;
use App\Infra\TokenGenerator;
use App\Infra\TokenValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ShopCoinsRewardController
{
    public function __construct(
        private CoinReward $shopCoinsRewardService
    ){}


    public function create(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();

            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $this->shopCoinsRewardService->create($params);

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

            $this->shopCoinsRewardService->delete($params);

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