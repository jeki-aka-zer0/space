<?php

declare(strict_types=1);

namespace Api\Model\Job\UseCase\Read;

use Api\Infrastructure\Framework\Settings\Settings;
use Api\Model\Job\Service\Job\JobsCollection;
use Api\ReadModel\Job\JobsReadRepository;

final class Handler
{
    private $jobs;
    private $settings;

    public function __construct(JobsReadRepository $Jobs, Settings $settings)
    {
        $this->jobs = $Jobs;
        $this->settings = $settings;
    }

    public function handle(): JobsCollection
    {
        $langCode = $this->settings->getLanguage();
        $jobs = $this->jobs->allActive($langCode);
        return new JobsCollection($jobs);
    }
}
