<?php

declare(strict_types=1);

use Api\Infrastructure\Model\Service\DoctrineFlusher;
use Api\Infrastructure\Model\Text\Entity\DoctrineTextRepository;
use Api\Infrastructure\ReadModel\Language\DoctrineLanguageReadRepository;
use Api\Infrastructure\ReadModel\Text\DoctrineTextReadRepository;
use Api\Model\Text\Entity\Text\TextRepository;
use Api\Model\Text\UseCase\Edit\Handler as TextEditHandler;
use Api\Model\Text\UseCase\Read\Handler as TextsReadHandler;
use Api\Model\Language\UseCase\Read\Handler as LanguagesReadHandler;
use Api\Model\Support\UseCase\Contact\Handler as SupportContactHandler;
use Api\Model\Support\Service\Contact\HandlerFactory as SupportHandlerFactory;
use Api\ReadModel\Language\LanguageReadRepository;
use Api\ReadModel\Text\TextReadRepository;
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
            $container->get(TextReadRepository::class)
        );
    },

    TextReadRepository::class => function (ContainerInterface $container): TextReadRepository {
        return new DoctrineTextReadRepository(
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
