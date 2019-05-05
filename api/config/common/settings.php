<?php

declare(strict_types=1);

use Api\Model\Language\Entity\Language\Code;
use Psr\Container\ContainerInterface;
use \Api\Infrastructure\Framework\Settings\Settings;

return [
    Settings::class => function (ContainerInterface $container): Settings {
        return new Settings(
            $container->get('settings')['global']
        );
    },

    'settings' => [
        'global' => [
            'language' => new Code(getenv('DEFAULT_LANGUAGE')),
        ],
    ],
];