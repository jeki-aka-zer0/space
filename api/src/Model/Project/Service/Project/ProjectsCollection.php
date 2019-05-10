<?php

declare(strict_types=1);

namespace Api\Model\Project\Service\Project;

use Api\Model\Project\Entity\Project\Project;
use ArrayObject;

final class ProjectsCollection extends ArrayObject
{
    public function serialize(): array
    {
        return array_map([$this, 'serializeOne'], (array)$this);
    }

    private function serializeOne(Project $project): array
    {
        return [
            'id' => $project->getId()->getId(),
            'name' => $project->getName(),
            'content' => $project->getContent(),
            'sort' => $project->getSort()->getPosition(),
        ];
    }
}
