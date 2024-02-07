<?php

namespace GeoQuiz\jeux\api\actions;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use GeoQuiz\jeux\api\services\sHistorique;

class PostHistoriqueAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $data = $request->getBody()->getcontents();
        $test = json_decode($data, true);
        $idUser = $test['idUser'];
        $idPartie = $test['idSerie'];
        $score = $test['score'];
        $service = new sHistorique();
        $historique = $service->createHistorique($idUser, $idPartie, $score);
        $response->getBody()->write(json_encode($historique));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }
}