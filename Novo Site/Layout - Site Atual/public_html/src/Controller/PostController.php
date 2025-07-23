<?php

namespace App\Controller;

use App\Entity\Post\Link;
use App\Helper\PostCategory;
use App\Service\AccountService;
use App\Service\PostService;
use App\Service\TemplateService;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Exception\HttpNotFoundException;

class PostController
{
    public function __construct(
        private PostService $postService,
        private TemplateService $view,
        private AccountService $accountService
    )
    {}

    public function indexArticle(RequestInterface $request, ResponseInterface $response, array $queryParams): ResponseInterface
    {
        try {
            $category = strtoupper($queryParams['category']);
            $categoryValue = PostCategory::getValue($category);
            
            $link = new Link($queryParams['link']);
            Link::validate($link);

            $post = $this->postService->getArticle($link);

        } catch (\InvalidArgumentException $th) {
            throw new HttpNotFoundException($request);
        }

        return $this->view->render($response, 'article', [
            'user'  => $this->accountService->getUserDataByLogin($_SESSION['login']),
            'post'     => $post,
            'category' => $categoryValue
        ]);
    }

    public function indexAll(RequestInterface $request, ResponseInterface $response, array $queryParams): ResponseInterface
    {
        $posts = $this->postService->listPublished(); 

        return $this->view->render($response, 'post-category', [
            'user'  => $this->accountService->getUserDataByLogin($_SESSION['login']),
            'posts'     => $posts,
            'category'  => 'Notícias'
        ]);
    }

    public function indexCategory(RequestInterface $request, ResponseInterface $response, array $queryParams): ResponseInterface
    {
        try {
            $category = strtoupper($queryParams['category']);
            //GetValue verifica se a categoria é válida ou lança uma exception
            $categoryValue = PostCategory::getValue($category);
            
        } catch (\InvalidArgumentException $th) {
            throw new HttpNotFoundException($request);
        }

        $posts = $this->postService->listByCategory($category);

        return $this->view->render($response, 'post-category', [
            'user'  => $this->accountService->getUserDataByLogin($_SESSION['login']),
            'posts'    => $posts,
            'category' => $categoryValue
        ]);
    }
}