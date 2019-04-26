<?php

declare(strict_types=1);

use Symfony\Component\Dotenv\Dotenv;

$directory = dirname(__DIR__);

require $directory . '/vendor/autoload.php';

// include environment
$env = $directory . '/.env';
if (file_exists($env)) {
    (new Dotenv)->load($env);
}
