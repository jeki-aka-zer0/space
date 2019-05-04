<?php

declare(strict_types=1);

namespace Api\ReadModel\Text;

interface TextReadRepository
{
    public function all(): array;
}
