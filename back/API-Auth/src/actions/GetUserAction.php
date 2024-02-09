<?php

namespace GeoQuiz\jeux\api\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use GeoQuiz\jeux\api\services\ServiceUser;
class GetUserAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        //Console.log de l'header
        var_dump("test");
        var_dump($request->getHeaders());
        $id = $args['id'];
        $service = new ServiceUser();
        $text = $service->getUser($id);
        $response->getBody()->write(json_encode($text));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}