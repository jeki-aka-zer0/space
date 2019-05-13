<?php

declare(strict_types=1);

namespace Api\Model\Job\Service\Job\Parser\HeadHunter;

use Api\ReadModel\Language\LanguageReadRepository;
use Exception;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use RuntimeException;

abstract class ParserFactory
{
    public static function build(ContainerInterface $container): Parser
    {
        /**
         * @var LanguageReadRepository $languages
         * @var LoggerInterface $logger
         */
        $languages = $container->get(LanguageReadRepository::class);
        $logger = $container->get(LoggerInterface::class);

        try {
            return new Parser(
                new Employer(getenv('HH_EMPLOYER_ID')),
                $languages->allActive(),
                $container->get(LoggerInterface::class)
            );
        } catch (Exception $exception) {
            $message = 'Can not build hh.ru parser.';
            $logger->error($message);
            throw new RuntimeException($message);
        }
    }
}
