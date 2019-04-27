<?php

declare(strict_types=1);

namespace Api\Model\Support\Entity\Contact;

final class Credentials
{
    public $subject;
    public $supportEmail;
    public $from;

    public function __construct(string $subject, string $supportEmail, array $from)
    {
        $this->subject = $subject;
        $this->supportEmail = $supportEmail;
        $this->from = $from;
    }
}
