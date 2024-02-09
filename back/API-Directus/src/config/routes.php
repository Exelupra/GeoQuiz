<?php
declare(strict_types=1);


use Slim\Exception\HttpNotFoundException;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use GeoQuiz\jeux\api\actions\TestAction;




return function(\Slim\App $app):void {
    $app->get('/test', TestAction::class)
        ->setName('test');
};
