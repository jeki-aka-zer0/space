<?php

declare(strict_types=1);

namespace Api\ReadModel\Job;

use Api\Model\Language\Entity\Language\Code;

interface JobsReadRepository
{
    public function allActive(Code $language): array;
}
