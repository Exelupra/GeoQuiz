<?php

namespace GeoQuiz\jeux\api\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use GeoQuiz\jeux\api\services\ServiceUser;
class LoadGameAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        //Console.log de l'header
        $id = $args['id'];;
        $service = new ServiceUser();
        $text = $service->load($id);
        $response->getBody()->write(json_encode($text));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}