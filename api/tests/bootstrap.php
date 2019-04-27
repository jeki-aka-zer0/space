<?php

declare(strict_types=1);

use \Api\Infrastructure\Environment\Loader as EnvLoader;

!defined('ROOT_DIR') && define('ROOT_DIR', dirname(__DIR__));

require ROOT_DIR . '/vendor/autoload.php';

// include environment
(new EnvLoader)->load();
