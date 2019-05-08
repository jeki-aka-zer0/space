<?php

declare(strict_types=1);

namespace Api\ReadModel\Project;

use Api\Model\Language\Entity\Language\Code;

interface ProjectsReadRepository
{
    public function allActive(Code $language): array;
}
