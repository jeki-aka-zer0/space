<?php

declare(strict_types=1);

namespace Api\ReadModel\Language;

interface LanguageReadRepository
{
    public function allActive(): array;
}
