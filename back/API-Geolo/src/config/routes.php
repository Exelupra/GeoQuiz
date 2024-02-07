<?php
declare(strict_types=1);


use Slim\Exception\HttpNotFoundException;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use GeoQuiz\jeux\api\actions\GetIdPartieAction;
return function(\Slim\App $app):void {
//header("Access-Control-Allow-Origin: http://docketu.iutnc.univ-lorraine.fr:42775");

//celle ci marche
    $app->get('/creePartie/{id}', GetIdPartieAction::class)
        ->setName('creePartie');

    $app->post('/creePartie/{idSerie}', \GeoQuiz\jeux\api\actions\CreePartieAction::class)
        ->setName('creePostPartie');

    $app->patch('/creePartie/{id}', \GeoQuiz\jeux\api\actions\PatchModifierPartieAction::class)
        ->setName('creePatchPartie');

    //GET/POST/DELETE /Historique
    $app->get('/Historique/{id}', \GeoQuiz\jeux\api\actions\GetIdHistoriqueAction::class)
        ->setName('Historique');
    $app->post('/Historique', \GeoQuiz\jeux\api\actions\PostHistoriqueAction::class)
        ->setName('HistoriquePost');
    $app->delete('/Historique/{id}', GetIdPartieAction::class)
        ->setName('HistoriqueDelete');

    $app->get('/test', GetIdPartieAction::class)
        ->setName('test');
    $app->options('/{routes:.+}', function ($request, $response, $args) {
        return $response;
    });
    $app->add(function ($request, $handler) {
        $response = $handler->handle($request);
        return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE')
            ->withHeader('Access-Control-Allow-Credentials', 'true');
    });

//header("Access-Control-Allow-Origin: http://docketu.iutnc.univ-lorraine.fr:42775");
};
