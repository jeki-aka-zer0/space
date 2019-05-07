<?php

declare(strict_types=1);

namespace Api\Model\Menu\Service\Menu;

use Api\Model\Menu\Entity\Item\Menu;
use ArrayObject;

final class MenuCollection extends ArrayObject
{
    public function serialize(): array
    {
        return array_map([$this, 'serializeOne'], (array)$this);
    }

    private function serializeOne(Menu $menu): array
    {
        return [
            'name' => $menu->getName(),
            'slug' => $menu->getSlug(),
            'sort' => $menu->getSort()->getPosition(),
        ];
    }
}
