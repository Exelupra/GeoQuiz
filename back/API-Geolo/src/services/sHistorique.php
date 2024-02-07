<?php

namespace GeoQuiz\jeux\api\services;
use GeoQuiz\jeux\api\DTO\HistoriqueDTO;
use GeoQuiz\jeux\api\models\Historique;

class sHistorique
{
    public function getHistorique($idSerie)
    {

        $historique = Historique::find($idSerie);
        $historiqueDTO = new HistoriqueDTO($historique->idHistorique, $historique->Score, $historique->idSerie, $historique->idUser,$historique->Date);
        return $historiqueDTO;
    }

    public function getHistoriquebyUser($idUser)
    {
        $historique = Historique::where('idUser', $idUser)->get();
        $historiqueDTO = [];
        foreach ($historique as $h) {
            $historiqueDTO[] = new HistoriqueDTO($h->idHistorique, $h->Score, $h->idSerie, $h->idUser,$h->Date);
        }
        return $historiqueDTO;
    }
    public function createHistorique($idUser, $idSerie, $Score)
    {
        $historique = new Historique();
        $historique->idUser = $idUser;
        $historique->idSerie = $idSerie;
        $historique->Score = $Score;
        $historique->Date= date('Y-m-d H:i:s');
        $historique->save();
        return $historique;
    }
}