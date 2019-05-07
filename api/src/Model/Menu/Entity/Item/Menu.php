<?php

declare(strict_types=1);

namespace Api\Model\Menu\Entity\Item;

use Api\Infrastructure\Model\Id\Id;
use Api\Infrastructure\Model\Sort\Sort;
use Api\Infrastructure\Model\Status\Status;
use Api\Infrastructure\Model\Status\StatusTrait;
use Api\Model\AggregateRoot;
use Api\Model\EventTrait;
use Api\Model\Language\Entity\Language\Language;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="nav_menu",
 *     indexes={
 *        @ORM\Index(name="sort_idx", columns={"sort"}),
 *     },
 *     uniqueConstraints={
 *        @ORM\UniqueConstraint(name="menu_unique", columns={"language_code", "slug"})
 *    }
 * )
 */
final class Menu implements AggregateRoot
{
    use EventTrait, StatusTrait;

    /**
     * @var Id
     * @ORM\Column(type="id")
     * @ORM\Id
     */
    private $id;

    /**
     * @var Language
     * @ORM\ManyToOne(targetEntity="Api\Model\Language\Entity\Language\Language")
     * @ORM\JoinColumn(name="language_code", referencedColumnName="code", nullable=false, onDelete="CASCADE")
     */
    private $language;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $slug;

    /**
     * @var Status
     * @ORM\Column(type="status")
     */
    private $status;

    /**
     * @var Sort
     * @ORM\Column(type="sort", unique=true)
     */
    private $sort;

    public function __construct(Id $id, Language $language, string $name, string $slug, Sort $sort)
    {
        $this->id = $id;
        $this->language = $language;
        $this->name = $name;
        $this->slug = $slug;
        $this->sort = $sort;
        $this->status = Status::DRAFT;
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * @return Language
     */
    public function getLanguage(): Language
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return Sort
     */
    public function getSort(): Sort
    {
        return $this->sort;
    }
}
