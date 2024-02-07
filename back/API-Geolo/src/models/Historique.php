<?php

namespace GeoQuiz\jeux\api\models;

class Historique extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'historique';
    protected $primaryKey = 'idHistorique';
    public $timestamps = false;

    public static function all()
    {
        //renvoyer la table historique
        return Historique::all();
    }

    public function partie()
    {
        return $this->belongsTo(Partie::class, 'idPartie');
    }

    public function historique()
    {
        return $this->belongsTo(Partie::class, 'idJoueur');
    }
}