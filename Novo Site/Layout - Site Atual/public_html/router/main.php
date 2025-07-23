<?php

use App\Middleware\{AuthMiddleware, FlashMiddleware};
use App\Controller\{HomeController, AccountController, AuthController, PostController, ShopCoinController,
CoinCheckoutController, OrderController, RankingController, CustomPagesController, DownloadController, ForgotController, 
CharacterController
};

$app->get('/', [HomeController::class, 'index'])->add(new FlashMiddleware());

$app->get('/register', [AccountController::class, 'registerIndex'])->add(new FlashMiddleware());
$app->post('/register', [AccountController::class, 'create']);

$app->get('/login', [AuthController::class, 'index'])->add(new FlashMiddleware());
$app->post('/login', [AuthController::class, 'login']);
$app->get('/logout', [AuthController::class, 'logout']);

$app->get('/downloads', [DownloadController::class, 'index']);

$app->get('/forgot', [ForgotController::class, 'indexForgot'])->add(new FlashMiddleware());
$app->post('/forgot-user', [ForgotController::class, 'forgotLogin']);
$app->post('/forgot-pw', [ForgotController::class, 'forgotPassword']);
$app->get('/forgot/password/{code}', [ForgotController::class, 'indexForgotPassword'])->add(new FlashMiddleware());
$app->post('/forgot/change-password', [ForgotController::class, 'changePassword']);

$app->get('/posts', [PostController::class, 'indexAll']);
$app->group('/post', function(\Slim\Routing\RouteCollectorProxy $group)
{
    $group->get('/{category}', [PostController::class, 'indexCategory']);
    $group->get('/{category}/{link}', [PostController::class, 'indexArticle']);
});

$app->get('/player-ranking[/{page}]', [RankingController::class, 'rankingLevel']);
$app->get('/guild-ranking[/{page}]', [RankingController::class, 'rankingGuild']);

$app->get('/terms-of-service', [CustomPagesController::class, 'tos']);
$app->get('/privacy-policy', [CustomPagesController::class, 'pop']);
$app->get('/rules', [CustomPagesController::class, 'about']);

// ROTAS QUE PRECISAM ESTAR AUTENTICADOS
$app->group('/', function(\Slim\Routing\RouteCollectorProxy $group)
{   
    $group->get('my-account', [AccountController::class, 'index'])->add(new FlashMiddleware());

    $group->post('change-password', [AccountController::class, 'changePassword']);
    $group->post('change-email', [AccountController::class, 'changeEmail']);
    $group->post('char-code', [AccountController::class, 'socialId']);
    $group->post('warehouse-password', [AccountController::class, 'warehousePassword']);

    $group->get('unstuck-char', [CharacterController::class, 'indexUnstuck'])->add(new FlashMiddleware());
    $group->post('unstuck-char', [CharacterController::class, 'unstuck']);

    $group->get('shop/coin', [ShopCoinController::class, 'index'])->add(new FlashMiddleware());
    $group->get('shop/coin/checkout/{product}', [CoinCheckoutController::class, 'index']);
    
    $group->post('shop/coin/checkout', [CoinCheckoutController::class, 'create']);
    
    $group->get('shop/orders', [OrderController::class, 'index']);
    $group->get('shop/orders/{orderID}', [OrderController::class, 'indexOrder'])->add(new FlashMiddleware());

})->add(new AuthMiddleware());

