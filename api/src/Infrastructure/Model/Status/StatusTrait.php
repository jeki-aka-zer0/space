<?php

declare(strict_types=1);

namespace Api\Infrastructure\Model\Status;

use DomainException;

/**
 * @property string $status
 */
trait StatusTrait
{
    public function isActive(): bool
    {
        return $this->status === Status::ACTIVE;
    }

    public function publish(): void
    {
        if ($this->isActive()) {
            throw new DomainException('Entity is already active.');
        }

        $this->status = Status::ACTIVE;
    }
}
