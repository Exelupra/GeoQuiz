<?php

namespace GeoQuiz\jeux\api\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
class PictureAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id=$args['id'];
        $apiUrl = 'http://docketu.iutnc.univ-lorraine.fr:37206/assets/'.$id;
        $response->getBody()->write(json_encode($apiUrl));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}