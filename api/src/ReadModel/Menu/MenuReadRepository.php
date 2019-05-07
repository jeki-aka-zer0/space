<?php

declare(strict_types=1);

namespace Api\ReadModel\Menu;

use Api\Model\Language\Entity\Language\Code;

interface MenuReadRepository
{
    public function allActive(Code $language): array;
}
