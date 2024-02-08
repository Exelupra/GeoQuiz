<?php

namespace GeoQuiz\jeux\api\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use GeoQuiz\jeux\api\services\ServiceUser;
class CheckResfreshUserAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $data = $request->getBody()->getcontents();
        $test = json_decode($data, true);
        $id = $test['id'];
        $token=$test['token'];
        $service = new ServiceUser();
        $text = $service->testRefresh($id,$token);
        $response->getBody()->write(json_encode($text));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }
}