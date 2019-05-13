<?php

declare(strict_types=1);

namespace Api\Model\Job\Service\Job\Parser;

use Api\Model\Job\Entity\Job\Job;

interface ParserInterface
{
    /**
     * Parse jobs and return an array ob job entities
     * @return iterable|Job[]
     */
    public function parse(): iterable;
}
