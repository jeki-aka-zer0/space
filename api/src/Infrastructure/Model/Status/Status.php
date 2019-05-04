<?php

declare(strict_types=1);

namespace Api\Infrastructure\Model\Status;

use Webmozart\Assert\Assert;

final class Status
{
    const DRAFT = 'draft';
    const ACTIVE = 'active';

    private $status;

    public function __construct(string $status)
    {
        $status = trim($status);
        Assert::oneOf($status, [static::DRAFT, static::ACTIVE]);
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function __toString(): string
    {
        return $this->status;
    }
}
