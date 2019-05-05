<?php

declare(strict_types=1);

namespace Api\ReadModel\Text;

use Api\Model\Language\Entity\Language\Code;

interface TextReadRepository
{
    public function all(Code $language): array;
}
