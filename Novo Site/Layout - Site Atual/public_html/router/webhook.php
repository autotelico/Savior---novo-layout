<?php

use App\Middleware\{AuthMiddleware};
use App\Controller\{WebhookController};

$app->post('/shop-proccess-orders/manual', [WebhookController::class, 'manual'])->add(new AuthMiddleware());
$app->post(PIX_CALLBACK, [WebhookController::class, 'pix']);
$app->post(PAYPAL_CALLBACK, [WebhookController::class, 'paypal']);