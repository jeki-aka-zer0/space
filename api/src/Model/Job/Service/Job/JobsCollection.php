<?php

declare(strict_types=1);

namespace Api\Model\Job\Service\Job;

use Api\Model\Job\Entity\Job\Job;
use ArrayObject;

final class JobsCollection extends ArrayObject
{
    public function serialize(): array
    {
        return array_map([$this, 'serializeOne'], (array)$this);
    }

    private function serializeOne(Job $Job): array
    {
        return [
            'id' => $Job->getId(),
            'name' => $Job->getName(),
            'experience' => $Job->getExperience(),
            'content' => $Job->getContent(),
            'sort' => $Job->getSort()->getPosition(),
        ];
    }
}
