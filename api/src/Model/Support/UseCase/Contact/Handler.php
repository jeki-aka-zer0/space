<?php

declare(strict_types=1);

namespace Api\Model\Support\UseCase\Contact;

use Api\Model\Support\Entity\Contact\Credentials;
use RuntimeException;
use Slim\Http\UploadedFile;
use Swift_Attachment;
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
            ->setBody($this->getBody($command), 'text/html');

        array_map(function (UploadedFile $file) use ($message): void {
            $message->attach(
                Swift_Attachment::fromPath($file->file)
                    ->setFilename($file->getClientFilename())
            );
        }, $command->files);

        if (!$this->mailer->send($message)) {
            throw new RuntimeException('Unable to send message.');
        }
    }

    private function getBody(Command $command): string
    {
        return <<<HTLML
<h1>New message:</h1>

<table>
    <tbody>
        <tr>
            <td>Name:</td>
            <td>{$command->name}</td>
        </tr>
        <tr>
            <td>E-mail:</td>
            <td>{$command->email}</td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td>{$command->phone}</td>
        </tr>
        <tr>
            <td>Message:</td>
            <td>{$command->message}</td>
        </tr>
    </tbody>
</table>
HTLML;
    }
}
