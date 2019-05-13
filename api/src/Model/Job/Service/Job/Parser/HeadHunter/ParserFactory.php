<?php

declare(strict_types=1);

namespace Api\Model\Job\Service\Job\Parser\HeadHunter;

use Api\Model\Language\Entity\Language\Code;
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
        $code = new Code('ru');

        try {
            return new Parser(
                new Employer(getenv('EMPLOYER_ID')),
                $languages->getByCode($code),
                $container->get(LoggerInterface::class)
            );
        } catch (Exception $exception) {
            $message = "It looks like language with code '{$code->getCode()}' does not exist.";
            $logger->error($message);
            throw new RuntimeException($message);
        }
    }
}
