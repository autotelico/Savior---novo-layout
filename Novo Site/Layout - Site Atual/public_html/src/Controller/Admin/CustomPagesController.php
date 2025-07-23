<?php

namespace App\Controller\Admin;

use App\Helper\Feedback;
use App\Helper\Flash;
use App\Repository\CustomPagesRepository;
use App\Service\TemplateService;
use App\Infra\TokenGenerator;
use App\Infra\TokenValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class CustomPagesController
{
    public function __construct(
        private TemplateService $view,
        private CustomPagesRepository $customPagesRepository
    ){}

    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $content = $this->customPagesRepository->getAll();
        return $this->view->render($response, 'admin/custom-page', [
            'tos' => $content[0],
            'pop' => $content[1],
            'about' => $content[2],
        ]);
    }

    public function update(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $params = $request->getParsedBody();

            TokenValidator::validate($params['token']);
            TokenGenerator::generate();

            $this->customPagesRepository->update($params['content'], $params['type']);

            Flash::setMsg(Feedback::SUCCESS->value);

            return $response
            ->withHeader('Location', '/admin/tos')
            ->withStatus(302);

        } catch (\Throwable $th) {
           Flash::setMsg($th->getMessage(), 'error');

           return $response
            ->withHeader('Location', '/admin/tos')
            ->withStatus(302);
        } 
    }
}