<?php

namespace GeoQuiz\jeux\api\models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Partie extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'Partie';
    protected $primaryKey = 'idPartie';

    public $timestamps = false;
    public function serie(): BelongsTo
    {
        return $this->belongsTo(Serie::class, 'idSerie');
    }


}