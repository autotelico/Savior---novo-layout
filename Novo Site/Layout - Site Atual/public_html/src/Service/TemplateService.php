<?php

namespace App\Service;

use Psr\Http\Message\ResponseInterface;
use \Twig\Environment;

class TemplateService 
{
    private Environment $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader([
            '../view',
            '../public',
            '../view/email'
        ]);

        $this->twig = new Environment($loader, [
            'cache'       => '../cache',
            'auto_reload' => true
        ]);

        $this->twig->addGlobal('session', $_SESSION);
        $this->twig->addExtension(new \App\Helper\TwigFunctions());
    }

    public function render(ResponseInterface $response, string $tplName, array $params = []): ResponseInterface
    {
        $response->getBody()->write($this->twig->render("{$tplName}.html", $params));
        return $response;
    }

    public function buildEmailBody(string $tplName, array $params = []): string
    {
        return $this->twig->render("{$tplName}.html", $params);
    }
}