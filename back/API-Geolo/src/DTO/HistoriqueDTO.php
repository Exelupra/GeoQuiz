<?php

namespace GeoQuiz\jeux\api\DTO;

class HistoriqueDTO extends DTO
{

    public $idHistorique;
    public $Score;
    public $idSerie;

    public $idUser;

    public $Date;
    public function __construct($idHistorique, $Score, $idSerie, $idUser, $Date)
    {
        $this->idHistorique = $idHistorique;
        $this->Score = $Score;
        $this->idSerie = $idSerie;
        $this->idUser = $idUser;
        $this->Date = $Date;
    }
}