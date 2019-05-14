<?php

declare(strict_types=1);

namespace Api\Console\Command;

use Api\Model\Flusher;
use Api\Model\Job\Entity\Job\JobRepository;
use Api\Model\Job\Service\Job\Parser\ParserInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;

final class JobParserCommandFactory
{
    private const JOBS_TABLE = 'job_jobs';
    private $container;
    private $em;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->em = $container->get(EntityManagerInterface::class);
    }

    public function getCommand(): ?JobParserCommand
    {
        return $this->isJobsTableExists()
            ? new JobParserCommand(
                $this->container->get(ParserInterface::class),
                $this->container->get(JobRepository::class),
                $this->container->get(Flusher::class)
            )
            : null;
    }

    private function isJobsTableExists(): bool
    {
        return $this->em
            ->getConnection()
            ->getSchemaManager()
            ->tablesExist([self::JOBS_TABLE]);
    }
}
