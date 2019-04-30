<?php

declare(strict_types=1);

namespace Api\Model\Language\Entity\Language;

use Webmozart\Assert\Assert;

final class Code
{
    private const LENGTH = 2;

    private $code;

    public function __construct(string $code)
    {
        Assert::notEmpty($code);
        Assert::length($code, self::LENGTH);
        $this->code = $code;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function __toString(): string
    {
        return $this->code;
    }
}
