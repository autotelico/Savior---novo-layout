<?php

namespace App\Controller;

use App\Service\AccountService;
use App\Service\PostService;
use App\Service\RankingService;
use App\Service\TemplateService;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HomeController
{
    public function __construct(
        private TemplateService $view,
        private PostService $postService,
        private AccountService $accountService,
        private RankingService $rankingService
    ){}

    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $posts = $this->postService->listPublished();

        return $this->view->render($response, 'home', [
            'user'  => $this->accountService->getUserDataByLogin($_SESSION['login']),
            'posts' => $posts,
            'topClass' => $this->rankingService->topClassWidget()
        ]);
    }
}