<?php

declare(strict_types=1);

namespace Api\Model\Language\Entity\Language;

use Api\Infrastructure\Model\Sort\Sort;
use Api\Infrastructure\Model\Status\Status;
use Api\Infrastructure\Model\Status\StatusTrait;
use Api\Model\AggregateRoot;
use Api\Model\EventTrait;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="lng_language",indexes={@ORM\Index(name="search_idx", columns={"code"})})
 */
final class Language implements AggregateRoot
{
    use EventTrait, StatusTrait;

    /**
     * @var Code
     * @ORM\Embedded(class="Code")
     */
    private $code;

    /**
     * @var string
     * @ORM\Column(type="string", unique=true)
     */
    private $name;

    /**
     * @var DateTimeImmutable
     * @ORM\Column(type="datetime_immutable", name="create_date")
     */
    private $createDate;

    /**
     * @var DateTimeImmutable
     * @ORM\Column(type="datetime_immutable", nullable=true, name="update_date")
     */
    private $updateDate;

    /**
     * @var Sort
     * @ORM\Embedded(class="Sort")
     */
    private $sort;

    /**
     * @var string
     * @ORM\Column(type="string", length=16)
     */
    private $status;

    public function __construct(Code $code, string $name, Sort $sort)
    {
        $this->code = $code;
        $this->name = $name;
        $this->createDate = new DateTimeImmutable;
        $this->sort = $sort;
        $this->status = Status::ACTIVE;
    }

    public function getCode(): Code
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
