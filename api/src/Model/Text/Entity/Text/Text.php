<?php

declare(strict_types=1);

namespace Api\Model\Text\Entity\Text;

use Api\Model\AggregateRoot;
use Api\Model\EventTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="text_texts")
 */
final class Text implements AggregateRoot
{
    use EventTrait;

    /**
     * @var TextId
     * @ORM\Column(type="text_text_id")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $content;

    public function __construct(TextId $id, string $name, string $content)
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
     * @return TextId
     */
    public function getId(): TextId
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
