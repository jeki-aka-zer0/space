<?php

declare(strict_types=1);

namespace Api\Model\Text\Entity\Text;

use Api\Infrastructure\Model\Id\Id;
use Api\Infrastructure\Model\Status\Status;
use Api\Model\AggregateRoot;
use Api\Model\EventTrait;
use Api\Model\Language\Entity\Language\Language;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="txt_texts")
 */
final class Text implements AggregateRoot
{
    use EventTrait;

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
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @var Status
     * @ORM\Column(type="status")
     */
    private $status;

    public function __construct(Id $id, string $name, string $content)
    {
        $this->id = $id;
        $this->name = $name;
        $this->content = $content;
    }

    public function edit(string $name, string $content): void
    {
        $this->name = $name;
        $this->content = $content;
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
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
    public function getContent(): string
    {
        return $this->content;
    }
}
