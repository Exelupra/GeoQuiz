<?php

namespace GeoQuiz\jeux\api\services;

class sHistorique
{
    public function __construct()
    {


    }

    public function getHistorique($idSerie)
    {
        $historique = array();
        $historique[] = new \DTO\HistoriqueDTO(1, 100, 1);
        $historique[] = new \DTO\HistoriqueDTO(2, 200, 1);
        $historique[] = new \DTO\HistoriqueDTO(3, 300, 1);
        $historique[] = new \DTO\HistoriqueDTO(4, 400, 1);
        $historique[] = new \DTO\HistoriqueDTO(5, 500, 1);
        $historique[] = new \DTO\HistoriqueDTO(6, 600, 1);
        $historique[] = new \DTO\HistoriqueDTO(7, 700, 1);
        $historique[] = new \DTO\HistoriqueDTO(8, 800, 1);
        $historique[] = new \DTO\HistoriqueDTO(9, 900, 1);
        $historique[] = new \DTO\HistoriqueDTO(10, 1000, 1);
        return $historique;
    }

}