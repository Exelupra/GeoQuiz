<?php

namespace GeoQuiz\jeux\api\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use GeoQuiz\jeux\api\services\ServiceUser;
class ConnectionUserAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        //Console.log de l'header
        $data = $request->getBody()->getcontents();
        $test = json_decode($data, true);
        $Email = $test['Email'];
        $MDP = $test['MDP'];
        $service = new ServiceUser();
        $text = $service->getConnect($Email, $MDP);
        $response->getBody()->write(json_encode($text));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}