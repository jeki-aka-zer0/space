<?php

declare(strict_types=1);

namespace Api\Model\Job\Service\Job\Parser\HeadHunter;

use Api\Model\Job\Service\Job\Parser\ParserInterface;
use Api\Model\Language\Entity\Language\Language;
use Psr\Log\LoggerInterface;
use RuntimeException;

final class Parser implements ParserInterface
{
    private $employerPage;
    private $logger;
    private $languages;

    /**
     * Parser constructor.
     * @param Employer $employerPage
     * @param Language[] $languages
     * @param LoggerInterface $logger
     */
    public function __construct(Employer $employerPage, array $languages, LoggerInterface $logger)
    {
        $this->employerPage = $employerPage;
        $this->languages = $languages;
        $this->logger = $logger;
    }

    public function parse(): iterable
    {
        return new JobsCollection($this->getJobs(), $this->languages);
    }

    private function getJobs(): array
    {
        return array_map([$this, 'getJob'], $this->employerPage->getJobsUrls());
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
