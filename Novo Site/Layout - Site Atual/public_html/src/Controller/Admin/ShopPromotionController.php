<?php

namespace App\Controller\Admin;

use App\Helper\Feedback;
use App\Helper\Flash;
use App\Service\Shop\PromotionService;
use App\Service\TemplateService;
use App\Infra\TokenGenerator;
use App\Infra\TokenValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ShopPromotionController
{
    public function __construct(
        private TemplateService $view,
        private PromotionService $shopPromotionService
    ){}

    public function index(RequestInterface $request, ResponseInterface $response, array $array): ResponseInterface
    {
        return $this->view->render($response, 'admin/shop-promotion', [
            'coinPaymentBonus' => $this->shopPromotionService->getCoinBonus(),
        ]);
    }

    public function createBonusPayment(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();

            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $this->shopPromotionService->updateCoinsBonus($params);

            Flash::setMsg(Feedback::SUCCESS->value);

            return $response
            ->withHeader('Location', '/admin/shop-promotion')
            ->withStatus(302);

        } catch (\Throwable $th) {
           Flash::setMsg($th->getMessage(), 'error');

           return $response
            ->withHeader('Location', '/admin/shop-promotion')
            ->withStatus(302);
        } 
    }

}