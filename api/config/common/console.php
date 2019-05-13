<?php

use Api\Console\Command\JobParserCommand;
use Api\Model\Flusher;
use Api\Model\Job\Entity\Job\JobRepository;
use Api\Model\Job\Service\Job\Parser\HeadHunter\ParserFactory;
use Api\Model\Job\Service\Job\Parser\ParserInterface;
use Psr\Container\ContainerInterface;

return [
    ParserInterface::class => function (ContainerInterface $container): ParserInterface {
        return ParserFactory::build($container);
    },

    JobParserCommand::class => function (ContainerInterface $container): JobParserCommand {
        return new JobParserCommand(
            $container->get(ParserInterface::class),
            $container->get(JobRepository::class),
            $container->get(Flusher::class)
        );
    },

    'config' => [
        'console' => [
            'commands' => [
                JobParserCommand::class,
            ],
        ],
    ],
];
