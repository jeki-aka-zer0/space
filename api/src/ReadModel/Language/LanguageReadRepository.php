<?php

declare(strict_types=1);

namespace Api\ReadModel\Language;

use Api\Model\Language\Entity\Language\Code;
use Api\Model\Language\Entity\Language\Language;

interface LanguageReadRepository
{
    public function allActive(): array;

    public function getByCode(Code $code): Language;
}
