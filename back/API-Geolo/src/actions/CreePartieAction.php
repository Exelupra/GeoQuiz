<?php

namespace GeoQuiz\jeux\api\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use GeoQuiz\jeux\api\services\sPartie;
class CreePartieAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        // Assurez-vous que $data['idSerie'] est défini avant d'accéder à sa valeur
        $idSerie = $args['idSerie'] ?? null;
        if ($idSerie === null) {
            // Si l'id de la série n'est pas fourni dans le corps de la requête, retournez une erreur
            $response->getBody()->write(json_encode(["error" => "L'id de la série est requis"]));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
        }
        $service = new sPartie();
        $partie = $service->createPartie($idSerie);
        $response->getBody()->write(json_encode($partie));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }
}