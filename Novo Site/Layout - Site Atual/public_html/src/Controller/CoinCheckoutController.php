<?php

namespace App\Controller;

use App\Helper\Feedback;
use App\Helper\Flash;
use App\Service\AccountService;
use App\Infra\Captcha\CaptchaService;
use App\Service\Shop\CoinService;
use App\Service\Shop\OrderService;
use App\Service\TemplateService;
use App\Infra\TokenGenerator;
use App\Infra\TokenValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Exception\HttpNotFoundException;

class CoinCheckoutController
{
    public function __construct(
        private TemplateService $view,
        private CoinService $coinService,
        private AccountService $accountService,
        private OrderService $orderService
    ){}

    public function index(RequestInterface $request, ResponseInterface $response, array $queryParams): ResponseInterface
    {
        try {
            $product = $queryParams['product'];
            $item = $this->coinService->checkout($product);

        } catch (\Throwable $th) {
            throw new HttpNotFoundException($request);
        }

        return $this->view->render($response, 'checkout-coin', [
            'coin' => $item,
            'bonus' => $this->coinService->coinsBonusPayment(),
            'user' => $this->accountService->getUserDataByLogin($_SESSION['login'])
        ]);
    }

    public function create(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();
            $serverParams = $request->getServerParams();
            
            CaptchaService::validate($params['g-recaptcha-response']);

            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $displayID = $this->orderService->create($params);

            Flash::setMsg(Feedback::ORDER_CREATED->value);

            return $response
            ->withHeader('Location', "/shop/orders/{$displayID}")
            ->withStatus(302);

        } catch (\Throwable $th) {
           Flash::setMsg($th->getMessage(), 'error');

           return $response
            ->withHeader('Location', '/shop/coin')
            ->withStatus(302);
        } 
    }
}