<?php

declare(strict_types=1);

namespace Api\Model\Support\UseCase\Contact;

use Symfony\Component\Validator\Constraints as Assert;

final class Command
{
    /**
     * @Assert\NotBlank(message="name.not_blank")
     * @Assert\Length(min=5, max=255)
     */
    public $name;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    public $email;

    /**
     * @Assert\Length(min=10, max=30)
     */
    public $phone;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=10, max=3000)
     */
    public $message;

    public $files = [];
}
