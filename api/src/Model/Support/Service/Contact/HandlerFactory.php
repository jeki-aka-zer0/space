<?php

declare(strict_types=1);

namespace Api\Model\Support\Service\Contact;

use Api\Model\Support\Entity\Contact\Credentials;
use Psr\Container\ContainerInterface;
use Api\Model\Support\UseCase\Contact\Handler;
use Swift_Mailer;

final class HandlerFactory
{
    public static function build(ContainerInterface $container): Handler
    {
        $config = $container->get('config');
        $subject = $config['support']['contact']['subject'];
        $from = $config['mailer']['from'];
        $to = getenv('API_MAILER_SUPPORT_EMAIL');
        $appName = getenv('API_APP_NAME');

        $credentials = new Credentials("{$appName}. {$subject}", $to, $from);

        return new Handler(
            $container->get(Swift_Mailer::class),
            $credentials
        );
    }
}
