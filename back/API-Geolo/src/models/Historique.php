<?php

namespace GeoQuiz\jeux\api\models;

class Historique extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'Historique';
    protected $primaryKey = 'idHistorique';
    public $timestamps = false;


    public function historique()
    {
        return $this->belongsTo(Partie::class, 'idSerie');
    }
}