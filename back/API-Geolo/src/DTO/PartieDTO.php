<?php

namespace GeoQuiz\jeux\api\DTO;

class PartieDTO extends DTO
{
    public $idPartie;
    public $idSerie;
    public $ScoreActuel;
    public $Etape;

    public function __construct($idPartie, $idSerie, $ScoreActuel, $Etape)
    {
        $this->idPartie = $idPartie;
        $this->idSerie = $idSerie;
        $this->ScoreActuel = $ScoreActuel;
        $this->Etape = $Etape;
    }
}