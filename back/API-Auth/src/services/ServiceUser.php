<?php

namespace GeoQuiz\jeux\api\services;
use GeoQuiz\jeux\api\DTO\UserDTO;
use GeoQuiz\jeux\api\models\User;

class serviceUser
{
    public function getUser($id)
    {

        $historique = User::find($id);
        $historiqueDTO = new UserDTO($historique->Id, $historique->Email, $historique->MDP, $historique->RefreshToken, $historique->RefreshDate, $historique->AccessToken, $historique->AccessDate);
        return $historiqueDTO;
    }

    public function createUser($email, $mdp)
    {
        $user = new User();
        $user->Email = $email;
        $user->MDP = $mdp;
        $user->save();
        return $user;
    }

    public function startAccess($id){
        $historique = User::find($id);
        if($historique->AccessToken == null){
            $historique->AccessToken = bin2hex(random_bytes(32));
            $historique->AccessDate = date("Y-m-d H:i:s");
            $historique->save();
        }
        return $historique->AccessToken;
    }

    public function startRefresh($id){
        $historique = User::find($id);
        if($historique->RefreshToken == null){
            $historique->RefreshToken = bin2hex(random_bytes(32));
            $historique->RefreshDate = date("Y-m-d H:i:s");
            $historique->save();
        }
        return $historique->RefreshToken;
    }

    public function testRefresh($id,$token){
        $historique = User::find($id);
        $historiqueDTO = new UserDTO($historique->Id, $historique->Email, $historique->MDP, $historique->RefreshToken, $historique->RefreshDate, $historique->AccessToken, $historique->AccessDate);
        $date = new DateTime($historiqueDTO->RefreshDate);
        $date->add(new DateInterval('PT1H'));
        if($token != $historiqueDTO->RefreshToken){
            return false;
        }else if($date > date("Y-m-d H:i:s")){
            return false;
        }
        return true;
    }

    public function testAccess($id,$token){
        $historique = User::find($id);
        $historiqueDTO = new UserDTO($historique->Id, $historique->Email, $historique->MDP, $historique->RefreshToken, $historique->RefreshDate, $historique->AccessToken, $historique->AccessDate);
        if($token != $historiqueDTO->AccessToken){
            return false;
        }
        return true;
    }
}