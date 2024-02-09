<?php
declare(strict_types=1);


use Slim\Exception\HttpNotFoundException;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use GeoQuiz\jeux\api\actions\GetIdPartieAction;
return function(\Slim\App $app):void {

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
    $app->delete('/Historique/{id}', \GeoQuiz\jeux\api\actions\DeleteHistoriqueAction::class)
        ->setName('HistoriqueDelete');
};
