<?php

declare(strict_types=1);

namespace Api\Http\Action\Project;

use Api\Model\Project\UseCase\Read\Handler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

final class ReadAction implements RequestHandlerInterface
{
    private $handler;

    public function __construct(Handler $handler)
    {
        $this->handler = $handler;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $projects = $this->handler->handle();

        return new JsonResponse(
            $projects->serialize(),
            200,
            ['X-total-count' => $projects->count()]
        );
    }
}
