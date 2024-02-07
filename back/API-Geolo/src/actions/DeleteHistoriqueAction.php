<?php

namespace GeoQuiz\jeux\api\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use GeoQuiz\jeux\api\services\sHistorique;

class DeleteHistoriqueAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $idHistorique = $args['id'] ?? null;
        if ($idHistorique === null) {
            $response->getBody()->write(json_encode(["error" => "L'id de l'historique est requis"]));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
        }
        $service = new sHistorique();
        $historique = $service->deleteHistorique($idHistorique);
        $response->getBody()->write(json_encode($historique));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}