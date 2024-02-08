<?php

namespace GeoQuiz\jeux\api\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use GeoQuiz\jeux\api\services\ServiceUser;
class CreeUserAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $data = $request->getBody()->getcontents();
        $test = json_decode($data, true);
        $Email = $test['Email'];
        $MDP = $test['MDP'];
        $MDPsolve= password_hash($MDP, PASSWORD_DEFAULT);
        $service = new ServiceUser();
        $text = $service->createUser($Email, $MDPsolve);
        $response->getBody()->write(json_encode($text));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }
}