<?php

declare(strict_types=1);

namespace Api\Http\Action\Support;

use Api\Http\ValidationException;
use Api\Http\Validator\Validator;
use Api\Model\Support\UseCase\Contact\Command;
use Api\Model\Support\UseCase\Contact\Handler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

final class ContactAction implements RequestHandlerInterface
{
    private $handler;
    private $validator;

    public function __construct(Handler $handler, Validator $validator)
    {
        $this->handler = $handler;
        $this->validator = $validator;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $command = $this->deserialize($request);

        if ($errors = $this->validator->validate($command)) {
            throw new ValidationException($errors);
        }

        $this->handler->handle($command);

        return new JsonResponse([], 200);
    }

    private function deserialize(ServerRequestInterface $request): Command
    {
        $command = new Command;
        $body = $request->getParsedBody();

        $command->name = $body['name'] ?? '';
        $command->email = $body['email'] ?? '';
        $command->message = $body['message'] ?? '';

        return $command;
    }
}
