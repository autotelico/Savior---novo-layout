<?php

namespace App\Controller;

use App\Service\AccountService;
use App\Service\RankingService;
use App\Service\TemplateService;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class RankingController
{
    public function __construct(
        private TemplateService $view,
        private RankingService $rankingService,
        private AccountService $accountService
    ){}

    public function rankingLevel(RequestInterface $request, ResponseInterface $response, array $queryParams): ResponseInterface
    {
        $page = (int) $queryParams['page'] == 0 ? 1 : (int) $queryParams['page'];
        $records = $this->rankingService->levelRanking($page);

        return $this->view->render($response, 'ranking-level', [
            'records' => $records['records'],
            'offset'  => $records['offset'],
            'user'    => $this->accountService->getUserDataByLogin($_SESSION['login']),
        ]);
    }

    public function rankingGuild(RequestInterface $request, ResponseInterface $response, array $queryParams): ResponseInterface
    {
        $page = (int) $queryParams['page'] == 0 ? 1 : (int) $queryParams['page'];
        $records = $this->rankingService->guildRanking($page);

        return $this->view->render($response, 'ranking-guild', [
            'records' => $records['records'],
            'offset'  => $records['offset']
        ]);
    }
}