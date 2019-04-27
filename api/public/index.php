<?php

declare(strict_types=1);

use Slim\App;
use \Api\Infrastructure\Environment\Loader as EnvLoader;

!defined('ROOT_DIR') && define('ROOT_DIR', dirname(__DIR__));

require ROOT_DIR . '/vendor/autoload.php';

// include environment
(new EnvLoader)->load();

// run application
(function (): void {
    $container = require ROOT_DIR . '/config/container.php';
    $app = new App($container);
    (require ROOT_DIR . '/config/routes.php')($app, $container);
    $app->run();
})();
