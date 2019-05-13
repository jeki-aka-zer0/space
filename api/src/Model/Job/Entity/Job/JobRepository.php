<?php

declare(strict_types=1);

namespace Api\Model\Job\Entity\Job;

interface JobRepository
{
    /**
     * Add new job
     * @param Job $job
     */
    public function add(Job $job): void;

    /**
     * Delete all jobs
     */
    public function clear(): void;
}
