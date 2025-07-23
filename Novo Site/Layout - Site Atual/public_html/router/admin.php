<?php

use App\Middleware\{FlashMiddleware, AdminAuthMiddleware};
use App\Controller\Admin\{AuthController, DashboardController, PostController, 
    ShopCoinsController, ShopCoinsRewardController, 
    ShopPromotionController, SearchController,
    CustomPagesController
    };

$app->get('/admin/login', [AuthController::class, 'index'])->add(new FlashMiddleware());
$app->post('/admin/login', [AuthController::class, 'login']);

// ROTAS QUE PRECISAM ESTAR AUTENTICADOS
$app->group('/admin', function(\Slim\Routing\RouteCollectorProxy $group)
{
    $group->get('/dashboard', [DashboardController::class, 'index'])->add(new FlashMiddleware());
    
    $group->get('/post[/{id}]', [PostController::class, 'index']);
    $group->get('/post/list/draft', [PostController::class, 'listDraft']);
    $group->get('/post/list/published', [PostController::class, 'listPublished']);
    $group->get('/post/delete/{id}', [PostController::class, 'delete']);
    $group->post('/post/create', [PostController::class, 'create']);

    $group->get('/shop-coins', [ShopCoinsController::class, 'index'])->add(new FlashMiddleware());
    $group->post('/shop-coins', [ShopCoinsController::class, 'create']);
    $group->post('/shop-coins/delete', [ShopCoinsController::class, 'delete']);

    $group->post('/cash-reward', [ShopCoinsRewardController::class, 'create']);
    $group->post('/cash-reward/delete', [ShopCoinsRewardController::class, 'delete']);
    
    $group->get('/shop-promotion', [ShopPromotionController::class, 'index'])->add(new FlashMiddleware());
    $group->post('/shop-promotion/payment-bonus', [ShopPromotionController::class, 'createBonusPayment']);
    
    $group->get('/tos', [CustomPagesController::class, 'index'])->add(new FlashMiddleware());
    $group->post('/tos', [CustomPagesController::class, 'update']);

    // Search
    $group->post('/search/order', [SearchController::class, 'order']);
    $group->get('/order/{id}', [SearchController::class, 'indexOrder'])->add(new FlashMiddleware());

})->add(new AdminAuthMiddleware());
