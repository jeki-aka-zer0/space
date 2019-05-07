<?php

declare(strict_types=1);

namespace Api\Http\Action\Menu;

use Api\Model\Menu\UseCase\Read\Handler;
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
        $menu = $this->handler->handle();

        return new JsonResponse(
            $menu->serialize(),
            200,
            ['X-total-count' => $menu->count()]
        );
    }
}
