<?php

namespace GeoQuiz\jeux\api\DTO;

class UserDTO extends DTO
{
    public $Id;

    public $MDP;
    public $RefreshToken;
    public $RefreshDate;

    public $AccessToken;

    public $AccessDate;

    public $Email;

    public function __construct($Id,$Email, $MDP, $RefreshToken, $RefreshDate, $AccessToken, $AccessDate)
    {
        $this->Id = $Id;
        $this->Email= $Email;
        $this->MDP = $MDP;
        $this->RefreshToken = $RefreshToken;
        $this->RefreshDate = $RefreshDate;
        $this->AccessToken = $AccessToken;
        $this->AccessDate = $AccessDate;
    }
}