<?php

namespace GeoQuiz\jeux\api\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
class ImageUniqueAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id=$args['id'];
        $apiUrl = 'http://docketu.iutnc.univ-lorraine.fr:37206/items/Image/'.$id;
        $jsonData = file_get_contents($apiUrl);
        if ($jsonData === false) {
            die('Erreur lors de la récupération des données de l\'API');
        }
        $response->getBody()->write(json_encode($jsonData));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}