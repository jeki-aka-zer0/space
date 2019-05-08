<?php

declare(strict_types=1);

namespace Api\ReadModel\Text;

use Api\Model\Language\Entity\Language\Code;

interface TextsReadRepository
{
    public function all(Code $language): array;
}
