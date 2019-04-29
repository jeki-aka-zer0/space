<?php

declare(strict_types=1);

use Api\Infrastructure\Doctrine\Type\Id\IdType;
use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\DBAL;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
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
        return EntityManager::create(
            $params['connection'],
            $config
        );
    },

    'config' => [
        'doctrine' => [
            'dev_mode' => false,
            'cache_dir' => ROOT_DIR . '/var/cache/doctrine',
            'metadata_dirs' => [
                /*ROOT_DIR . '/src/Infrastructure/Model/Sort',
                ROOT_DIR . '/src/Infrastructure/Model/Status',*/

                ROOT_DIR . '/src/Model/Text/Entity',
                /*ROOT_DIR . '/src/Model/Language/Entity',*/
            ],
            'connection' => [
                'url' => getenv('API_DB_URL'),
            ],
            'types' => [
                IdType::NAME => IdType::class,
            ],
        ],
    ],
];