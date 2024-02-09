<?php

namespace GeoQuiz\jeux\api\DTO;

class ImageDTO extends DTO
{
    public $idImage;

    public $serie;
    public $Nom;
    public $Image;

    public $geo;

    public function __construct($idImage, $serie, $Nom, $Image, $geo)
    {
        $this->idImage = $idImage;
        $this->serie = $serie;
        $this->Nom = $Nom;
        $this->Image = $Image;
        $this->geo = $geo;
    }
}