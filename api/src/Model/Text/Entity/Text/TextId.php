<?php

declare(strict_types=1);

namespace Api\Model\Text\Entity\Text;

use Exception;
use Ramsey\Uuid\Uuid;
use Webmozart\Assert\Assert;

final class TextId
{
    private $id;

    public function __construct(string $id)
    {
        Assert::notEmpty($id);
        $this->id = $id;
    }

    /**
     * @return TextId
     * @throws Exception
     */
    public static function next(): self
    {
        return new self(Uuid::uuid4()->toString());
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
