<?php

declare(strict_types=1);

use Api\Infrastructure\Model\Service\DoctrineFlusher;
use Api\Infrastructure\Model\Text\Entity\DoctrineTextRepository;
use Api\Model\Text\Entity\Text\TextRepository;
use Api\Model\Text\UseCase\Edit\Handler;
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

    TextRepository::class => function (ContainerInterface $container): DoctrineTextRepository {
        return new DoctrineTextRepository(
            $container->get(EntityManagerInterface::class)
        );
    },

    Handler::class => function (ContainerInterface $container): Handler {
        return new Handler(
            $container->get(TextRepository::class),
            $container->get(Flusher::class)
        );
    },
];
