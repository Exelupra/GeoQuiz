<?php

namespace GeoQuiz\jeux\api\actions;

use GeoQuiz\jeux\api\services\sPartie;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
class PatchModifierPartieAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        //Ici on récupère l'id de la partie puis on modifie le score actuel et l'étape de la partie
        $id = $args['id'];
        $data = $request->getBody()->getcontents();
        $test = json_decode($data, true);
        $score = $test['score'];
        $service = new sPartie();
        $partie = $service->updatePartie($id, $score);
        $response->getBody()->write(json_encode($partie));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}