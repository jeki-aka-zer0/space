<?php

declare(strict_types=1);

namespace Api\Model\Text\UseCase\Edit;

use Symfony\Component\Validator\Constraints as Assert;

final class Command
{
    /**
     * @Assert\NotBlank()
     */
    public $id;
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     */
    public $name;
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=20)
     */
    public $content;
}
