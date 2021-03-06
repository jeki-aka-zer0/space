<?php

declare(strict_types=1);

use Api\Http\Action;
use Api\Http\Middleware;
use Api\Infrastructure\Framework\Middleware\CallableMiddlewareAdapter as CM;
use Psr\Container\ContainerInterface;
use Slim\App;

return function (App $app, ContainerInterface $container): void {

    $app->add(new CM($container, Middleware\BodyParamsMiddleware::class));
    $app->add(new CM($container, Middleware\LanguageMiddleware::class));
    $app->add(new CM($container, Middleware\DomainExceptionMiddleware::class));
    $app->add(new CM($container, Middleware\ValidationExceptionMiddleware::class));

    $app->get('/', Action\HomeAction::class . ':handle');

    $app->group('/text', function (): void {
        $this->get('', Action\Text\ReadAction::class . ':handle');
        $this->post('/{id}', Action\Text\UpdateAction::class . ':handle');
    });

    $app->group('/menu', function (): void {
        $this->get('', Action\Menu\ReadAction::class . ':handle');
    });

    $app->group('/project', function (): void {
        $this->get('', Action\Project\ReadAction::class . ':handle');
    });

    $app->group('/job', function (): void {
        $this->get('', Action\Job\ReadAction::class . ':handle');
    });

    $app->group('/language', function (): void {
        $this->get('', Action\Language\ReadAction::class . ':handle');
    });

    $app->group('/support', function (): void {
        $this->post('/contact', Action\Support\ContactAction::class . ':handle');
    });
};