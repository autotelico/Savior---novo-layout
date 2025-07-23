<?php

namespace App\Controller\Admin;

use App\Service\DashboardContentService;
use App\Service\TemplateService;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class DashboardController
{
    public function __construct(
        private DashboardContentService $dashboardService,
        private TemplateService $view
    ){}

    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->view->render($response, 'admin/dashboard', [
            'cashList'           => $this->dashboardService->listAccountsCashAmount(5),
            'totalAccounts'      => $this->dashboardService->totalAccounts(),
            'itensList'          => $this->dashboardService->listAmountOfItens(5),
            'orders'             => $this->dashboardService->listOrders(5),
            'orderReports'       => $this->dashboardService->ordersReport(),
            'emailsSent'         => $this->dashboardService->countEmailsSentToday(),
        ]);
    }

}