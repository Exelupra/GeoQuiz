<?php

use Illuminate\Database\Capsule\Manager;
use Slim\Factory\AppFactory;
use Slim\Handlers\Strategies\RequestHandler;
use Slim\Psr7\Request;
use Slim\Psr7\Response;


date_default_timezone_set('Europe/Paris');

$app = AppFactory::create();

// Ajoute le routing middleware
$app->addRoutingMiddleware();


// Ajoute le middleware d'erreurs
$app->addErrorMiddleware(true, false, false);

// Définit le chemin de base
$app->setBasePath('');

/*
$db = new Manager();
$db->addConnection(parse_ini_file(__DIR__ . '/../config/db.ini'));
$db->setAsGlobal();
$db->bootEloquent();
*/

// Initialise la session
session_start();

return $app;
