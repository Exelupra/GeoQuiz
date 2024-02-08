<?php

namespace GeoQuiz\jeux\api\models;

class User extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'User';
    protected $primaryKey = 'Id';
    public $timestamps = false;

}