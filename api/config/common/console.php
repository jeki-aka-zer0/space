<?php

use Api\Console\Command\JobParserCommandFactory;
use Api\Console\Command\JobParserCommand;
use Api\Model\Job\Service\Job\Parser\HeadHunter\ParserFactory;
use Api\Model\Job\Service\Job\Parser\ParserInterface;
use Psr\Container\ContainerInterface;

return [
    ParserInterface::class => function (ContainerInterface $container): ParserInterface {
        return ParserFactory::build($container);
    },

    JobParserCommandFactory::class => function (ContainerInterface $container): JobParserCommandFactory {
        return new JobParserCommandFactory($container);
    },

    JobParserCommand::class => function (ContainerInterface $container): ?JobParserCommand {
        /**
         * @var JobParserCommandFactory $factory
         */
        $factory = $container->get(JobParserCommandFactory::class);
        return $factory->getCommand();
    },

    'config' => [
        'console' => [
            'commands' => [
                JobParserCommand::class,
            ],
        ],
    ],
];
