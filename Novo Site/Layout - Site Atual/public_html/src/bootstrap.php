<?php

date_default_timezone_set('America/Sao_Paulo');
// ArkCMS
use App\Service\TemplateService;
use App\Infra\TokenGenerator;
use Slim\Factory\AppFactory;

require_once('../vendor/autoload.php');
require_once('../src/config.php');

error_reporting(E_ALL & ~E_WARNING);
session_start();

if (!isset($_SESSION['token'])) {
    TokenGenerator::generate();
}

header('X-Powered-By: ArkCMS');
header('Author-Discord: tso.dev');

$container = new \DI\Container();

AppFactory::setContainer($container);

$app = AppFactory::create();

$errorMiddleware = $app->addErrorMiddleware(DEBUG, true, true);

// NotFound e MethodNotAllowed = erro 404;
$errorMiddleware->setErrorHandler([\Slim\Exception\HttpNotFoundException::class, \Slim\Exception\HttpMethodNotAllowedException::class], 
function (\Psr\Http\Message\ServerRequestInterface $request,)
{
    $response = new \Slim\Psr7\Response();
    $view = $this->get(TemplateService::class);
    return $view->render($response, '404');
});

require_once('../router/main.php');
require_once('../router/admin.php');
require_once('../router/api.php');
require_once('../router/webhook.php');

$app->run();