<?php

declare(strict_types=1);

use Api\Infrastructure\Framework\ErrorHandler\LogHandler;
use Api\Infrastructure\Framework\ErrorHandler\LogPhpHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

return [
    LoggerInterface::class => function (ContainerInterface $container): Logger {
        $config = $container->get('config')['logger'];
        $logger = new Logger('API');
        $logger->pushHandler(new StreamHandler($config['file']));
        return $logger;
    },

    'errorHandler' => function (ContainerInterface $container): LogHandler {
        return new LogHandler(
            $container->get(LoggerInterface::class),
            $container->get('settings')['displayErrorDetails']
        );
    },

    'phpErrorHandler' => function (ContainerInterface $container): LogPhpHandler {
        return new LogPhpHandler(
            $container->get(LoggerInterface::class),
            $container->get('settings')['displayErrorDetails']
        );
    },

    'config' => [
        'logger' => [
            'file' => ROOT_DIR . '/var/log/app.log',
        ],
    ],
];