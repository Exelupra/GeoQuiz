<?php

namespace GeoQuiz\jeux\api\DTO;

class HistoriqueDTO extends DTO
{

    public $idHistorique;
    public $Score;
    public $idSerie;

    public function __construct($idHistorique, $Score, $idSerie)
    {
        $this->idHistorique = $idHistorique;
        $this->Score = $Score;
        $this->idSerie = $idSerie;
    }
}