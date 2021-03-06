<?php

declare(strict_types=1);

use Api\Console\Command\FixtureCommand;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;

return [
    FixtureCommand::class => function (ContainerInterface $container): FixtureCommand {
        return new FixtureCommand(
            $container->get(EntityManagerInterface::class),
            ROOT_DIR . '/src/Data/Fixture/Dev'
        );
    },

    'config' => [
        'console' => [
            'commands' => [
                FixtureCommand::class,
            ],
        ],
    ],
];
