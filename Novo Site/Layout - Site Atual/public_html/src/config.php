<?php
define('DEBUG', true);

define('PHP_FIREWALL_ACTIVATION', true);
require_once('firewall.php');

//APLICAÇÃO
define('SERVER_NAME', 'Metin2 Savior');
define('SERVER_URL', 'https://metin2savior.com'); // Sem barra no final
define('USE_LYCAN', false);

// CRIAÇÃO DE CONTAS
define('ENABLE_REGISTER', true);

// BANCO DE DADOS
define('DB_USER', 'root');
define('DB_HOST', '151.243.218.165');
define('DB_PASS', 'Savior@@2025*25');

define('DB_ACCOUNT', 'account');
define('DB_PLAYER', 'player');
define('DB_LOG', 'log');
define('DB_ARK', 'ark');

define('DB_PORT', '3306');
define('CHARSET', 'utf8');
define('RESERVERD_NAME_SUPORTE', 'Suporte');
//CAMPOS DA TABELA ACCOUNT
define('COINS', 'cash');
define('DRAGON_COINS', 'mileage'); 
define('IP', 'ip'); 

// Google reCaptchaV2
define('ENABLE_CAPTCHA', false);
define('CAPTCHA_PUBLIC_KEY', '6LduBSQqAAAAANh1JATSSy5iXhn9Nn_jjocV7nVW');
define('CAPTCHA_PRIVATE_KEY', '6LduBSQqAAAAAP3LZNify9l1qYZKFNSa1VA6zt31');

//EMAIL
define('EMAIL_LIMIT', 5);
define('EMAIL_TIME_WAIT', 2); //MINUTOS
define('SMTP_HOST', 'smtp.hostinger.com');
define('SMTP_EMAIL', 'suporte@alcatraz2.online');
define('SMTP_PASS', '/C!XX>F;!9q');
define('SMTP_SENDER_EMAIL', 'suporte@alcatraz2.online');
define('SMTP_PORT', 465);

//P2P
define('ENABLE_P2P', false);
define('ADMINPAGE_IP', '');
define('ADMINPAGE_PASSWORD', '');
define('PORTS', [
    13000,
    13001,
    13002,
    13099,
]);

// Configurar Rotas de Callback
//SERVIÇOS DE PAGAMENTO:
//PIX - PagHiper
define('PIX_PUBLIC_KEY', 'apk_46478443-cnrLItPmWHcYJtwWnmQAcaPkTlztZdgk');
define('PIX_PRIVATE_KEY', 'AQDAM9Q9PSA8JKPWBJMJZDX3R1JUF6TA0W5IFXLAIL2U');

define('PIX_ENDPOINT_CREATE', 'https://pix.paghiper.com/invoice/create/');
define('PIX_ENDPOINT_STATUS', 'https://pix.paghiper.com/invoice/status/');
define('PIX_ENDPOINT_NOTIFICATION', 'https://pix.paghiper.com/invoice/notification/');

define('PIX_ORDER_EXPIRE', 1); // 1 Dia
define('PIX_DESCRIPTION', "Moedas Cash - " . SERVER_NAME); 
define('PIX_CALLBACK', "/web/call/payment/pix"); 
define('PIX_CALLBACK_NOTIFICATION', SERVER_URL . PIX_CALLBACK);

// Paypal IPN
define('PAYPAL_ENDPOINT','https://ipnpb.paypal.com/cgi-bin/webscr');
define('PAYPAL_CALLBACK','/web/call/payment/paypal');
define('PAYPAL_ACCOUNT_EMAIL','seuemaildoapaypal@email.com');
