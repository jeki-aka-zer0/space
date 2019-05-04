<?php

declare(strict_types=1);

namespace Api\Infrastructure\Model\Sort;

use Webmozart\Assert\Assert;

final class Sort
{
    const MIN = 1;

    private $position;

    public function __construct(int $position)
    {
        Assert::greaterThanEq($position, self::MIN);
        $this->position = $position;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function __toString(): string
    {
        return (string)$this->position;
    }
}
