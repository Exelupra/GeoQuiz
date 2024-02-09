<?php
declare(strict_types=1);


use Slim\Exception\HttpNotFoundException;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use GeoQuiz\jeux\api\actions\CreeUserAction;
use GeoQuiz\jeux\api\actions\TestAction;
use GeoQuiz\jeux\api\actions\CheckAccessUserAction;
use GeoQuiz\jeux\api\actions\StartAccessUserAction;
use GeoQuiz\jeux\api\actions\StartRefreshUserAction;
use GeoQuiz\jeux\api\actions\CheckResfreshUserAction;




return function(\Slim\App $app):void {
    $app->post('/user', CreeUserAction::class)
        ->setName('creeUser');

    $app->get('/user/{id}', TestAction::class)
        ->setName('getUser');

    $app->post('/user/checkaccess', CheckAccessUserAction::class)
        ->setName('checkAccessUser');

    $app->get('/user/{id}/startaccess', StartAccessUserAction::class)
        ->setName('startAccessUser');

    $app->get('/user/{id}/startrefresh', StartRefreshUserAction::class)
        ->setName('startRefreshUser');

    $app->post('/user/checkrefresh', CheckResfreshUserAction::class)
        ->setName('checkRefreshUser');
};
