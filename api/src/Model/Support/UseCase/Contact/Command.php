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
    public $name;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    public $email;

    /**
     * @Assert\Length(min=10)
     * @Assert\Length(max=30)
     */
    public $phone;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=20)
     */
    public $message;
}
