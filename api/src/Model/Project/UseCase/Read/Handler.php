<?php

declare(strict_types=1);

namespace Api\Model\Project\UseCase\Read;

use Api\Infrastructure\Framework\Settings\Settings;
use Api\Model\Project\Service\Project\ProjectsCollection;
use Api\ReadModel\Project\ProjectsReadRepository;

final class Handler
{
    private $projects;
    private $settings;

    public function __construct(ProjectsReadRepository $projects, Settings $settings)
    {
        $this->projects = $projects;
        $this->settings = $settings;
    }

    public function handle(): ProjectsCollection
    {
        $langCode = $this->settings->getLanguage();
        $projects = $this->projects->allActive($langCode);
        return new ProjectsCollection($projects);
    }
}
