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
    private $language;
    private $position = 1;

    public function __construct(array $input, Language $language, $flags = 0, $iterator_class = 'ArrayIterator')
    {
        $this->language = $language;
        $input = array_map([$this, 'createJobs'], $input);
        parent::__construct($input, $flags, $iterator_class);
    }

    /**
     * @param JobDTO $jobDTO
     * @return Job
     * @throws Exception
     */
    private function createJobs(JobDTO $jobDTO): Job
    {
        $job = new Job(
            Id::next(),
            $this->language,
            $jobDTO->name,
            $jobDTO->experience,
            $jobDTO->description,
            $this->getSort()
        );
        $job->publish();
        return $job;
    }

    private function getSort(): Sort
    {
        return new Sort($this->position++);
    }
}
