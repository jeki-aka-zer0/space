<?php

declare(strict_types=1);

namespace Api\Model\Job\Service\Job\Parser;

interface ParserInterface
{
    /**
     * Parse jobs and save them to the database
     */
    public function parseAndSave(): void;
}
