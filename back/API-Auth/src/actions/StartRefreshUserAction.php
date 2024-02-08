<?php

namespace GeoQuiz\jeux\api\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use GeoQuiz\jeux\api\services\ServiceUser;
class StartRefreshUserAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = $args['id'];
        $service = new ServiceUser();
        $text = $service->startRefresh($id);
        $response->getBody()->write(json_encode($text));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }
}