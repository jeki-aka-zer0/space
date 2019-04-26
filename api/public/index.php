<?php

declare(strict_types=1);

use Slim\App;
use Symfony\Component\Dotenv\Dotenv;

$directory = dirname(__DIR__);

require $directory . '/vendor/autoload.php';

// include environment
$env = $directory . '/.env';
if (file_exists($env)) {
    (new Dotenv)->load($env);
}

// run application
(function () use ($directory): void {
    $container = require $directory . '/config/container.php';
    $app = new App($container);
    (require $directory . '/config/routes.php')($app, $container);
    $app->run();
})();
