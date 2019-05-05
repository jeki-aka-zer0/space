<?php

declare(strict_types=1);

namespace Api\Http\Action;

use Api\Infrastructure\Framework\Settings\Settings;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;

final class HomeAction implements RequestHandlerInterface
{
    private $settings;

    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $code = $this->settings->getLanguage()->getCode();
        return new JsonResponse([
            'name' => $code === 'ru' ? 'Сайт-визитка компании Cosmos' : 'Cosmos business card API',
            'version' => '1.0',
        ]);
    }
}
