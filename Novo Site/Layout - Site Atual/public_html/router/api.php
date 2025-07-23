<?php

use App\Infra\Database\DatabaseConnection;
use App\Repository\AccountRepository;
use App\Repository\PlayerRepository;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Routing\RouteCollectorProxy;

$app->group('/api', function(RouteCollectorProxy $group) {

    $group->get('/statistics', function(Request $request, Response $response) {
        
        $playersOnline = 0;
        $playersOnline24h = 0;
        $accountsCreated = 0;
        $characterCreated = 0;
        $guildsCreated = 0;

        try {
            $dbConnection = new DatabaseConnection();

            $playersOnline += (new PlayerRepository($dbConnection))->getOnlinePlayersInterval();
            $playersOnline24h += (new PlayerRepository($dbConnection))->getOnlinePlayersInterval(1440); //24 Horas em Minutos
            $accountsCreated = (new AccountRepository($dbConnection))->totalAccounts();
            $characterCreated = $dbConnection->select("SELECT COUNT(id) as total FROM ".DB_PLAYER.".player")['total'];
            $guildsCreated = $dbConnection->select("SELECT COUNT(id) as total FROM ".DB_PLAYER.".guild")['total'];

        } catch (\Exception $e) {
            //ignore
        } finally {
            $response->getBody()->write(json_encode([
                'playersOnline'    => $playersOnline,
                'playersOnline24h' => $playersOnline24h,
                'accounts'         => $accountsCreated,
                'players'          => $characterCreated,
                'guilds'           => $guildsCreated,
            ]));

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200); 
        }
        
    });

    
});