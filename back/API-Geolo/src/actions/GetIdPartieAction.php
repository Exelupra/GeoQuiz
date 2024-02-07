<?php

namespace GeoQuiz\jeux\api\actions;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use GeoQuiz\jeux\api\services\sPartie;
class GetIdPartieAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
       $service=new sPartie();
        $id = $args['id'];
        $partie = $service->getPartie($id);
        if ($partie == null) {
            $response->getBody()->write(json_encode("Partie non trouvée"));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(404);
        }
        $response->getBody()->write(json_encode($partie));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }}
