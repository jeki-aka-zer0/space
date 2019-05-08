<?php

declare(strict_types=1);

use Api\Infrastructure\Doctrine\Event\MigrationEventSubscriber;
use Api\Infrastructure\Doctrine\Type\Code\CodeType;
use Api\Infrastructure\Doctrine\Type\Id\IdType;
use Api\Infrastructure\Doctrine\Type\Sort\SortType;
use Api\Infrastructure\Doctrine\Type\Status\StatusType;
use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\Common\EventManager;
use Doctrine\DBAL;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Tools\ToolEvents;
use Psr\Container\ContainerInterface;

return [
    EntityManagerInterface::class => function (ContainerInterface $container): EntityManager {
        $params = $container['config']['doctrine'];
        $config = Setup::createAnnotationMetadataConfiguration(
            $params['metadata_dirs'],
            $params['dev_mode'],
            $params['cache_dir'],
            new FilesystemCache(
                $params['cache_dir']
            ),
            false
        );
        foreach ($params['types'] as $type => $class) {
            if (!DBAL\Types\Type::hasType($type)) {
                DBAL\Types\Type::addType($type, $class);
            }
        }
        $eventManager = new EventManager;
        $eventManager->addEventListener([ToolEvents::postGenerateSchema], new MigrationEventSubscriber);
        return EntityManager::create(
            $params['connection'],
            $config,
            $eventManager
        );
    },

    'config' => [
        'doctrine' => [
            'dev_mode' => false,
            'cache_dir' => ROOT_DIR . '/var/cache/doctrine',
            'metadata_dirs' => [
                ROOT_DIR . '/src/Model/Language/Entity',
                ROOT_DIR . '/src/Model/Menu/Entity',
                ROOT_DIR . '/src/Model/Project/Entity',
                ROOT_DIR . '/src/Model/Text/Entity',
            ],
            'connection' => [
                'url' => getenv('API_DB_URL'),
            ],
            'types' => [
                IdType::NAME => IdType::class,
                StatusType::NAME => StatusType::class,
                CodeType::NAME => CodeType::class,
                SortType::NAME => SortType::class,
            ],
        ],
    ],
];