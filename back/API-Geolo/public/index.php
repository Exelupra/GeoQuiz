<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
$appli = require_once __DIR__ . '/../src/config/bootstrap.php';
(require_once __DIR__ . '/../src/config/routes.php')($appli);

$appli->run();
