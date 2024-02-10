<?php

namespace GeoQuiz\jeux\api\actions;

use GeoQuiz\jeux\api\services\sPartie;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use GeoQuiz\jeux\api\services\sHistorique;

class DeletePartieAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $idPartie = $args['id'] ?? null;
        if ($idPartie === null) {
            $response->getBody()->write(json_encode(["error" => "L'id de la partie est requis"]));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
        }
        $service = new sPartie();
        $historique = $service->deletePartie($idPartie);
        $response->getBody()->write(json_encode($historique));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}