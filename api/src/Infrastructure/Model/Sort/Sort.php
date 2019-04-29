<?php

declare(strict_types=1);

namespace Api\Infrastructure\Model\Sort;

use Doctrine\ORM\Mapping as ORM;
use Webmozart\Assert\Assert;

/**
 * @ORM\Embeddable
 */
final class Sort
{
    const MIN = 1;

    /**
     * @var integer
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $position;

    public function __construct(string $position)
    {
        Assert::greaterThan($position, self::MIN);
        $this->position = $position;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function __toString(): string
    {
        return $this->position;
    }
}
