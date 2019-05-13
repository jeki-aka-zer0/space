<?php

declare(strict_types=1);

use Api\Infrastructure\Framework\Settings\Settings;
use Api\Infrastructure\Model\Job\Entity\DoctrineJobRepository;
use Api\Infrastructure\Model\Service\DoctrineFlusher;
use Api\Infrastructure\Model\Text\Entity\DoctrineTextRepository;
use Api\Infrastructure\ReadModel\Language\DoctrineLanguageReadRepository;
use Api\Infrastructure\ReadModel\Text\DoctrineTextsReadRepository;
use Api\Infrastructure\ReadModel\Menu\DoctrineMenuReadRepository;
use Api\Infrastructure\ReadModel\Project\DoctrineProjectsReadRepository;
use Api\Infrastructure\ReadModel\Job\DoctrineJobsReadRepository;
use Api\Model\Job\Entity\Job\JobRepository;
use Api\Model\Text\Entity\Text\TextRepository;
use Api\Model\Text\UseCase\Edit\Handler as TextEditHandler;
use Api\Model\Text\UseCase\Read\Handler as TextsReadHandler;
use Api\Model\Menu\UseCase\Read\Handler as MenuReadHandler;
use Api\Model\Project\UseCase\Read\Handler as ProjectsReadHandler;
use Api\Model\Job\UseCase\Read\Handler as JobsReadHandler;
use Api\Model\Language\UseCase\Read\Handler as LanguagesReadHandler;
use Api\Model\Support\UseCase\Contact\Handler as SupportContactHandler;
use Api\Model\Support\Service\Contact\HandlerFactory as SupportHandlerFactory;
use Api\ReadModel\Language\LanguageReadRepository;
use Api\ReadModel\Text\TextsReadRepository;
use Api\ReadModel\Menu\MenuReadRepository;
use Api\ReadModel\Project\ProjectsReadRepository;
use Api\ReadModel\Job\JobsReadRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use Api\Model\Flusher;

return [
    Flusher::class => function (ContainerInterface $container): DoctrineFlusher {
        return new DoctrineFlusher(
            $container->get(EntityManagerInterface::class),
            $container->get(Api\Model\EventDispatcher::class)
        );
    },

    TextRepository::class => function (ContainerInterface $container): TextRepository {
        return new DoctrineTextRepository(
            $container->get(EntityManagerInterface::class)
        );
    },

    TextEditHandler::class => function (ContainerInterface $container): TextEditHandler {
        return new TextEditHandler(
            $container->get(TextRepository::class),
            $container->get(Flusher::class)
        );
    },

    TextsReadHandler::class => function (ContainerInterface $container): TextsReadHandler {
        return new TextsReadHandler(
            $container->get(TextsReadRepository::class),
            $container->get(Settings::class)
        );
    },

    TextsReadRepository::class => function (ContainerInterface $container): TextsReadRepository {
        return new DoctrineTextsReadRepository(
            $container->get(EntityManagerInterface::class)
        );
    },

    MenuReadHandler::class => function (ContainerInterface $container): MenuReadHandler {
        return new MenuReadHandler(
            $container->get(MenuReadRepository::class),
            $container->get(Settings::class)
        );
    },

    MenuReadRepository::class => function (ContainerInterface $container): MenuReadRepository {
        return new DoctrineMenuReadRepository(
            $container->get(EntityManagerInterface::class)
        );
    },

    ProjectsReadHandler::class => function (ContainerInterface $container): ProjectsReadHandler {
        return new ProjectsReadHandler(
            $container->get(ProjectsReadRepository::class),
            $container->get(Settings::class)
        );
    },

    ProjectsReadRepository::class => function (ContainerInterface $container): ProjectsReadRepository {
        return new DoctrineProjectsReadRepository(
            $container->get(EntityManagerInterface::class)
        );
    },

    JobsReadHandler::class => function (ContainerInterface $container): JobsReadHandler {
        return new JobsReadHandler(
            $container->get(JobsReadRepository::class),
            $container->get(Settings::class)
        );
    },

    JobsReadRepository::class => function (ContainerInterface $container): JobsReadRepository {
        return new DoctrineJobsReadRepository(
            $container->get(EntityManagerInterface::class)
        );
    },

    JobRepository::class => function (ContainerInterface $container): JobRepository {
        return new DoctrineJobRepository(
            $container->get(EntityManagerInterface::class)
        );
    },

    LanguagesReadHandler::class => function (ContainerInterface $container): LanguagesReadHandler {
        return new LanguagesReadHandler(
            $container->get(LanguageReadRepository::class)
        );
    },

    LanguageReadRepository::class => function (ContainerInterface $container): LanguageReadRepository {
        return new DoctrineLanguageReadRepository(
            $container->get(EntityManagerInterface::class)
        );
    },

    SupportContactHandler::class => function (ContainerInterface $container): SupportContactHandler {
        return SupportHandlerFactory::build($container);
    },

    'config' => [
        'support' => [
            'contact' => [
                'subject' => 'New message.',
            ],
        ],
    ],
];
