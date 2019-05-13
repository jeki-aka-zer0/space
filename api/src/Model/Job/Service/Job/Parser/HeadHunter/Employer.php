<?php

declare(strict_types=1);

namespace Api\Model\Job\Service\Job\Parser\HeadHunter;

use PHPHtmlParser\Dom;
use RuntimeException;

final class Employer
{
    private const DOMAIN = 'https://hh.ru/employer';
    private const JOB_ITEM_SELECTOR = '.resume-search-item__name';
    private $employerId;

    public function __construct(string $employerId)
    {
        $this->employerId = $employerId;
    }

    /**
     * @return string[]
     */
    public function getJobsUrls(): array
    {
        return array_map([$this, 'getLink'], $this->getJobs()->toArray());
    }

    private function getJobs(): Dom\Collection
    {
        $employerPage = new Dom;
        $employerPage->loadFromUrl($this->getUrl());
        return $employerPage->find(self::JOB_ITEM_SELECTOR);
    }

    private function getUrl(): string
    {
        return self::DOMAIN . '/' . $this->employerId;
    }

    private function getLink(Dom\HtmlNode $job): string
    {
        if (!$link = $job->find('a')) {
            throw new RuntimeException('Can not find link in job item.');
        }

        return (string)$link->getAttribute('href');
    }
}
