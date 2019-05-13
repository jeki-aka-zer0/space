<?php

declare(strict_types=1);

namespace Api\Model\Job\Service\Job\Parser\HeadHunter;

use Api\Infrastructure\Model\Id\Id;
use Api\Infrastructure\Model\Sort\Sort;
use Api\Model\Language\Entity\Language\Language;
use ArrayObject;
use \Api\Model\Job\Entity\Job\Job;
use Exception;

final class JobsCollection extends ArrayObject
{
    private $languages;
    private $position = 1;
    private $jobs = [];

    /**
     * JobsCollection constructor.
     * @param array $input
     * @param Language[] $languages
     * @param int $flags
     * @param string $iterator_class
     */
    public function __construct(array $input, array $languages, $flags = 0, $iterator_class = 'ArrayIterator')
    {
        $this->languages = $languages;
        array_map([$this, 'createJobs'], $input);
        parent::__construct($this->jobs, $flags, $iterator_class);
    }

    /**
     * @param JobDTO $jobDTO
     * @throws Exception
     */
    private function createJobs(JobDTO $jobDTO): void
    {
        array_map(function (Language $language) use ($jobDTO): void {
            $job = new Job(
                Id::next(),
                $language,
                $jobDTO->name,
                $jobDTO->experience,
                $jobDTO->description,
                $this->getSort()
            );
            $job->publish();
            $this->jobs[] = $job;
        }, $this->languages);
    }

    private function getSort(): Sort
    {
        return new Sort($this->position++);
    }
}
