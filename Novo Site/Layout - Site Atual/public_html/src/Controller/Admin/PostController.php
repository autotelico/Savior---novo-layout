<?php

namespace App\Controller\Admin;

use App\Helper\Feedback;
use App\Helper\PostCategory;
use App\Helper\ResponseHelper;
use App\Service\Admin\PostService;
use App\Service\TemplateService;
use App\Infra\TokenGenerator;
use App\Infra\TokenValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class PostController
{
    public function __construct(
        private TemplateService $view,
        private PostService $postService,
    ){}

    public function index(RequestInterface $request, ResponseInterface $response, array $array): ResponseInterface
    {
        if ($array['id']) {
            $post = $this->postService->getPost((int) $array['id']);
        }

        return $this->view->render($response, 'admin/post', [
            'categories'   => PostCategory::values(),
            'post'         => $post ?? null
        ]);
    }

    public function create(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();

            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $post = $this->postService->create($params);

            // $this->fileManager->createHomeNewsHTML();

            $message = ResponseHelper::success(Feedback::POST_SAVED->value, true, [
                'id' => $post->getId(),
                'views' => $post->getViews(),
                'date' => $post->getDate(),
                'link' => $post->getLink()->__toString()
            ]);

            $status = 201;
            
        } catch (\Throwable $th) {
            $message = ResponseHelper::success($th->getMessage(), false);
            $status = 400;

        } finally {
            $response->getBody()->write($message);
            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus($status);
        }
    }

    public function listDraft(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {   
        $params = $request->getParsedBody();

        $drafts = $this->postService->listDraft($params);

        $response->getBody()->write($drafts);
        return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
    }

    public function listPublished(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $params = $request->getParsedBody();

        $published = $this->postService->listPublished($params);

        $response->getBody()->write($published);
        return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
    }

    public function delete(RequestInterface $request, ResponseInterface $response, array $array): ResponseInterface
    {
        $this->postService->delete((int) $array['id']);
        // $this->fileManager->createHomeNewsHTML();
        
        return $response->withStatus(200);
    }
}