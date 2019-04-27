<?php

declare(strict_types=1);

namespace Api\Model\Support\UseCase\Contact;

final class Handler
{
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(Command $command): void
    {
        $message = (new \Swift_Message('Sign Up Confirmation'))
            ->setFrom('zer0.stat@mail.ru')
            ->setTo('jekiakazer0@gmail.com')
            ->setBody($command->message);

        if (!$this->mailer->send($message)) {
            throw new \RuntimeException('Unable to send message.');
        }
    }
}
