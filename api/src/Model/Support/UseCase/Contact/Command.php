<?php

declare(strict_types=1);

namespace Api\Model\Support\UseCase\Contact;

use Symfony\Component\Validator\Constraints as Assert;

final class Command
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=5)
     */
    public $message;
}
