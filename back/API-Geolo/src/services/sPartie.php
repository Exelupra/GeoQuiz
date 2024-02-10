<?php

namespace GeoQuiz\jeux\api\services;
use GeoQuiz\jeux\api\models\Partie;
use GeoQuiz\jeux\api\DTO\PartieDTO;

class sPartie
{

    public function getPartie($idPartie)
    {
        $partie = Partie::find($idPartie);
        if($partie == null){
            return "Partie non trouvée";
        }
        $partieDTO = new PartieDTO($partie->idPartie, $partie->idSerie, $partie->ScoreActuel, $partie->Etape);
        return $partieDTO;
    }

    public function getParties()
    {
        $parties = Partie::all();
        $partiesDTO = [];
        foreach ($parties as $p) {
            $partiesDTO[] = new PartieDTO($p->idPartie, $p->idSerie, $p->ScoreActuel, $p->Etape);
        }
        return $partiesDTO;
    }

    public function createPartie($idSerie)
    {
        $partie = new Partie();
        $partie->idSerie = $idSerie;
        $partie->ScoreActuel = 0;
        $partie->Etape = 1;
        $partie->save();
        return $partie;
    }

    public function updatePartie($idPartie, $ScoreActuel)
    {
        $partie = Partie::find($idPartie);
        $partie->ScoreActuel = $partie->ScoreActuel+$ScoreActuel;
        $partie->Etape = $partie->Etape + 1;
        if ($partie->Etape > 10) {
            return "Partie terminée";
        }
        $partie->save();
        return $partie;
    }

    public function deletePartie($idPartie)
    {
        $partie = Partie::find($idPartie);
        $partie->delete();
    }
}