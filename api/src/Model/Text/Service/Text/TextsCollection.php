<?php

declare(strict_types=1);

namespace Api\Model\Text\Service\Text;

use Api\Model\Text\Entity\Text\Text;
use ArrayObject;

final class TextsCollection extends ArrayObject
{
    public function serialize(): array
    {
        return array_map([$this, 'serializeOne'], (array)$this);
    }

    private function serializeOne(Text $language): array
    {
        return [
            'language' => $language->getLanguage()->getCode()->getCode(),
            'name' => $language->getName(),
            'slug' => $language->getSlug(),
            'content' => $language->getContent(),
        ];
    }
}
