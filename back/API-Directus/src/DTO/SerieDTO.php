<?php

namespace GeoQuiz\jeux\api\DTO;

class SerieDTO extends DTO
{
    public $idSerie;

    public $Nom;
    public $geoSerie;
    public $images;

    public function __construct($idSerie, $Nom, $geoSerie, $images)
    {
        $this->idSerie = $idSerie;
        $this->Nom = $Nom;
        $this->geoSerie = $geoSerie;
        $this->images = $images;
    }
}