<?php

declare(strict_types=1);

namespace Api\Infrastructure\Model\Id;

use Exception;
use Ramsey\Uuid\Uuid;
use Webmozart\Assert\Assert;

final class Id
{
    private $id;

    public function __construct(string $id)
    {
        Assert::notEmpty($id);
        $this->id = $id;
    }

    /**
     * @return Id
     * @throws Exception
     */
    public static function next(): self
    {
        return new static(Uuid::uuid4()->toString());
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->id;
    }
}
