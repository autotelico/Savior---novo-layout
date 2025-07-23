<?php

namespace App\Controller\Admin;

use App\Helper\Flash;
use App\Service\Shop\OrderService;
use App\Service\TemplateService;
use App\Infra\TokenGenerator;
use App\Infra\TokenValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class SearchController
{
    public function __construct(
        private TemplateService $view,
        private OrderService $orderService,
    ){}

    public function indexOrder(RequestInterface $request, ResponseInterface $response, array $queryParams): ResponseInterface
    {
        $order = $this->orderService->getOrder($queryParams['id']);
        return $this->view->render($response, 'admin/order-details', [
            'order' => $order,
        ]);
    }

    public function order(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();

            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $order = $this->orderService->search($params);
            
            return $this->view->render($response, 'admin/search-order', [
                'order' => $order
            ]);

        } catch (\Throwable $th) {
           Flash::setMsg($th->getMessage(), 'error');

           return $response
            ->withHeader('Location', '/admin/dashboard')
            ->withStatus(302);
        } 
    }
}