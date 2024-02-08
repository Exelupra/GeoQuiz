<?php
declare(strict_types=1);


use Slim\Exception\HttpNotFoundException;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use GeoQuiz\jeux\api\actions\CreeUserAction;
use GeoQuiz\jeux\api\actions\GetUserAction;
use GeoQuiz\jeux\api\actions\CheckAccessUserAction;
use GeoQuiz\jeux\api\actions\StartAccessUserAction;
use GeoQuiz\jeux\api\actions\StartRefreshUserAction;
use GeoQuiz\jeux\api\actions\CheckResfreshUserAction;




return function(\Slim\App $app):void {
    $app->post('/user', CreeUserAction::class)
        ->setName('creeUser');

    $app->get('/user/{id}', GetUserAction::class)
        ->setName('getUser');

    $app->post('/user/checkaccess', CheckAccessUserAction::class)
        ->setName('checkAccessUser');

    $app->get('/user/{id}/startaccess', StartAccessUserAction::class)
        ->setName('startAccessUser');

    $app->get('/user/{id}/startrefresh', StartRefreshUserAction::class)
        ->setName('startRefreshUser');

    $app->post('/user/checkrefresh', CheckResfreshUserAction::class)
        ->setName('checkRefreshUser');

    $app->add(function ($request, $handler) {
        $response = $handler->handle($request);
        return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE')
            ->withHeader('Access-Control-Allow-Credentials', 'true');
    });
};
