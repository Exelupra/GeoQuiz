<?php

namespace GeoQuiz\jeux\api\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use GeoQuiz\jeux\api\services\ServiceUser;
class SaveGameAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        //Console.log de l'header
        $id = $args['id'];
        $data = $request->getBody()->getcontents();
        $test = json_decode($data, true);
        $game = $test['game'];
        $service = new ServiceUser();
        $text = $service->save($id,$game);
        $response->getBody()->write(json_encode($text));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}