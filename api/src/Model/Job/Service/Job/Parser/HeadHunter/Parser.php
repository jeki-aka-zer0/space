<?php

declare(strict_types=1);

namespace Api\Model\Job\Service\Job\Parser\HeadHunter;

use Api\Model\Job\Service\Job\Parser\ParserInterface;
use Psr\Log\LoggerInterface;
use RuntimeException;

final class Parser implements ParserInterface
{
    private $employerPage;
    private $logger;

    public function __construct(Employer $employerPage, LoggerInterface $logger)
    {
        $this->employerPage = $employerPage;
        $this->logger = $logger;
    }

    public function parseAndSave(): void
    {
        array_map([$this, 'getJob'], $this->employerPage->getJobsUrls());
    }

    private function getJob(string $url): ?JobDTO
    {
        try {
            $parser = new Job($url);
            $job = $parser->getJob();
            return $job;
        } catch (RuntimeException $exception) {
            $this->logger->critical($exception->getMessage());
            return null;
        }
    }
}
