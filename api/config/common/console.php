<?php

use Api\Console\Command\JobParserCommand;
use Api\Model\Job\Service\Job\Parser\HeadHunter\Employer;
use Api\Model\Job\Service\Job\Parser\HeadHunter\Parser;
use Api\Model\Job\Service\Job\Parser\ParserInterface;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

return [
    ParserInterface::class => function (ContainerInterface $container): ParserInterface {
        return new Parser(
            new Employer(getenv('EMPLOYER_ID')),
            $container->get(LoggerInterface::class)
        );
    },

    JobParserCommand::class => function (ContainerInterface $container): JobParserCommand {
        return new JobParserCommand(
            $container->get(ParserInterface::class)
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
