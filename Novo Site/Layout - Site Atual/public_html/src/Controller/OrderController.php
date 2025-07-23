<?php

namespace App\Controller;

use App\Entity\Post\Link;
use App\Helper\PaymentMethod;
use App\Service\AccountService;
use App\Service\Shop\OrderService;
use App\Service\TemplateService;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Exception\HttpNotFoundException;

class OrderController
{
    public function __construct(
        private TemplateService $view,
        private OrderService $orderService,
        private AccountService $accountService
    ){}

    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->view->render($response, 'order-list', [
            'orders' => $this->orderService->getOrdersByLogin($_SESSION['login']),
            'user'   => $this->accountService->getUserDataByLogin($_SESSION['login']),
        ]);
    }

    public function indexOrder(RequestInterface $request, ResponseInterface $response, array $queryParams): ResponseInterface
    {
        try {
            $orderID = $queryParams['orderID'];
            Link::validate($orderID);
            
            $order = $this->orderService->getOrder($orderID);

            if ($order->getLogin()->__toString() !== $_SESSION['login']->__toString()) {
                throw new \Exception();
            }

        } catch (\Throwable $th) {
            throw new HttpNotFoundException($request);
        }

        $pixDetails = $this->orderService->getPixPaymentOptionsForIncompleteOrder($order);
        
        return $this->view->render($response, 'order-details', [
            'order' => $order,
            'pix'   => $pixDetails,
            'user'  => $this->accountService->getUserDataByLogin($_SESSION['login']),
        ]);
    }
}