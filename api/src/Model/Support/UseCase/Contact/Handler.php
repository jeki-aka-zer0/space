<?php

declare(strict_types=1);

namespace Api\Model\Support\UseCase\Contact;

use Api\Model\Support\Entity\Contact\Credentials;
use RuntimeException;
use Swift_Mailer;
use Swift_Message;

final class Handler
{
    private $mailer;
    private $credentials;

    public function __construct(Swift_Mailer $mailer, Credentials $credentials)
    {
        $this->mailer = $mailer;
        $this->credentials = $credentials;
    }

    public function handle(Command $command): void
    {
        $message = (new Swift_Message($this->credentials->subject))
            ->setFrom($this->credentials->from)
            ->setTo($this->credentials->supportEmail)
            ->setBody($this->getBody($command));

        if (!$this->mailer->send($message)) {
            throw new RuntimeException('Unable to send message.');
        }
    }

    private function getBody(Command $command): string
    {
        return <<<TXT
Name: {$command->name}
E-mail: {$command->email}
Phone: {$command->phone}
Message: {$command->message}
TXT;
    }
}
