<?php
declare(strict_types=1);


use Slim\Exception\HttpNotFoundException;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use GeoQuiz\jeux\api\actions\SerieAction;
use GeoQuiz\jeux\api\actions\SerieUniqueAction;
use GeoQuiz\jeux\api\actions\ImageUniqueAction;
use GeoQuiz\jeux\api\actions\PictureAction;


return function(\Slim\App $app):void {
    $app->get('/serie', SerieAction::class)
        ->setName('serie');
    $app->get('/serie/{id}', SerieUniqueAction::class)
        ->setName('solo');
    $app->get('/image/{id}', ImageUniqueAction::class)
        ->setName('image');
    $app->get('/picture/{id}', PictureAction::class)
        ->setName('picture');
};
