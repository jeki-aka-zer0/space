#!/usr/bin/env php
<?php

declare(strict_types=1);

use Doctrine\DBAL\Migrations\Tools\Console\Helper\ConfigurationHelper;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Application;
use \Api\Infrastructure\Environment\Loader as EnvLoader;

!defined('ROOT_DIR') && define('ROOT_DIR', dirname(__DIR__));

require ROOT_DIR . '/vendor/autoload.php';

// include environment
(new EnvLoader)->load();

/**
 * @var ContainerInterface $container
 */
$container = require ROOT_DIR . '/config/container.php';

$cli = new Application('Application console');

$entityManager = $container->get(EntityManagerInterface::class);
$connection = $entityManager->getConnection();

$configuration = new Doctrine\DBAL\Migrations\Configuration\Configuration($connection);
$configuration->setMigrationsDirectory('src/Data/Migration');
$configuration->setMigrationsNamespace('Api\Data\Migration');

$cli->getHelperSet()->set(new EntityManagerHelper($entityManager), 'em');
$cli->getHelperSet()->set(new ConfigurationHelper($connection, $configuration), 'configuration');

Doctrine\ORM\Tools\Console\ConsoleRunner::addCommands($cli);
Doctrine\DBAL\Migrations\Tools\Console\ConsoleRunner::addCommands($cli);

$commands = $container->get('config')['console']['commands'];
array_map(function (? string $class) use ($cli, $container): void {
    if ($instance = $container->get($class)) {
        $cli->add($container->get($class));
    }
}, $commands);

$cli->run();
