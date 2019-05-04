<?php

declare(strict_types=1);

namespace Api\Http\Action\Language;

use Api\Model\Language\UseCase\Read\Handler;
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
        $languages = $this->handler->handle();

        return new JsonResponse([
            'count' => $languages->count(),
            'data' => $languages->serialize(),
        ]);
    }
}
