<?php

namespace GeoQuiz\jeux\api\actions;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use GeoQuiz\jeux\api\services\sHistorique;
class GetIdHistoriqueAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $service=new sHistorique();
        $id = $args['id'];
        $historique = $service->getHistoriquebyUser($id);
        if ($historique == null) {
            $response->getBody()->write(json_encode("Historique non trouvée"));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(404);
        }
        $response->getBody()->write(json_encode($historique));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }

}