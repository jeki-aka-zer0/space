<?php

declare(strict_types=1);

namespace Api\Http\Action\Text;

use Api\Http\ValidationException;
use Api\Http\Validator\Validator;
use Api\Model\Text\UseCase\Edit\Command;
use Api\Model\Text\UseCase\Edit\Handler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

final class UpdateAction implements RequestHandlerInterface
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

        $id = $this->handler->handle($command);

        return new JsonResponse([
            'id' => $id->getId(),
        ], 201);
    }

    private function deserialize(ServerRequestInterface $request): Command
    {
        $command = new Command;
        $body = $request->getParsedBody();

        $command->id = $request->getAttribute('id');
        $command->name = $body['name'] ?? '';
        $command->content = $body['content'] ?? '';

        return $command;
    }
}
