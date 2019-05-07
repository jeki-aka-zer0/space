<?php

declare(strict_types=1);

namespace Api\Model\Language\Service\Language;

use Api\Model\Language\Entity\Language\Language;
use ArrayObject;

final class LanguagesCollection extends ArrayObject
{
    public function serialize(): array
    {
        return array_map([$this, 'serializeOne'], (array)$this);
    }

    private function serializeOne(Language $language): array
    {
        return [
            'code' => $language->getCode()->getCode(),
            'name' => $language->getName(),
            'sort' => $language->getSort()->getPosition(),
        ];
    }
}
