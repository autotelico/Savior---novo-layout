<?php

namespace App\Service;

use App\Repository\AccountRepository;
use App\Repository\ForgotRepository;
use App\Repository\PlayerRepository;
use App\Service\Shop\OrderService;

class DashboardContentService 
{
    public function __construct(
        private AccountRepository $accountRepository,
        private PlayerRepository $playerRepository,
        private OrderService $orderService,
        private ForgotRepository $forgotRepository,
    )
    {}

    public function listOrders(int $limit): array
    {
        return $this->orderService->listAll($limit);
    }

    public function ordersReport(): array
    {
        return $this->orderService->ordersReport();
    }

    public function listAccountsCashAmount(int $results): array
    {
       return $this->accountRepository->listAccountsCashAmount($results);
    }

    public function totalAccounts(): int
    {
        return $this->accountRepository->totalAccounts();
    }

    public function listAmountOfItens(int $results): array
    {
        return $this->playerRepository->listAmountOfItens($results);
    }

    public function countEmailsSentToday(): int
    {
        return $this->forgotRepository->countEmailsSentToday();
    }

}