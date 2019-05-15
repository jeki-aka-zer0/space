<?php

declare(strict_types=1);

use Api\Http\Action\HomeAction;
use Api\Http\Action\Support\ContactAction;
use Api\Http\Middleware\BodyParamsMiddleware;
use Api\Http\Middleware\DomainExceptionMiddleware;
use Api\Http\Middleware\LanguageMiddleware;
use Api\Http\Middleware\ValidationExceptionMiddleware;
use Api\Http\Validator\Validator;
use Api\Infrastructure\Validator\TranslatorFactory;
use Api\Infrastructure\Validator\ValidatorFactory;
use Api\ReadModel\Language\LanguageReadRepository;
use Psr\Container\ContainerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Api\Infrastructure\Framework\Settings\Settings;
use Api\Http\Action\Text\UpdateAction as TextUpdateAction;
use Api\Model\Text\UseCase\Edit\Handler as TextEditHandler;
use Api\Http\Action\Text\ReadAction as TextsReadAction;
use Api\Model\Text\UseCase\Read\Handler as TextsReadHandler;
use Api\Http\Action\Menu\ReadAction as MenuReadAction;
use Api\Model\Menu\UseCase\Read\Handler as MenuReadHandler;
use Api\Http\Action\Project\ReadAction as ProjectsReadAction;
use Api\Model\Project\UseCase\Read\Handler as ProjectsReadHandler;
use Api\Http\Action\Job\ReadAction as JobsReadAction;
use Api\Model\Job\UseCase\Read\Handler as JobsReadHandler;
use Api\Http\Action\Language\ReadAction as LanguagesReadAction;
use Api\Model\Language\UseCase\Read\Handler as LanguagesReadHandler;
use Api\Model\Support\UseCase\Contact\Handler as SupportContactHandler;

return [
    TranslatorFactory::class => function (ContainerInterface $container): TranslatorFactory {
        return new TranslatorFactory(
            $container->get(Settings::class),
            $container->get('config')['validator']['path']
        );
    },

    ValidatorInterface::class => function (ContainerInterface $container): ValidatorInterface {
        return (new ValidatorFactory($container->get(TranslatorFactory::class)))
            ->build();
    },

    Validator::class => function (ContainerInterface $container): Validator {
        return new Validator(
            $container->get(ValidatorInterface::class)
        );
    },

    BodyParamsMiddleware::class => function (): BodyParamsMiddleware {
        return new BodyParamsMiddleware;
    },

    LanguageMiddleware::class => function (ContainerInterface $container): LanguageMiddleware {
        return new LanguageMiddleware(
            $container->get(LanguageReadRepository::class),
            $container->get(Settings::class)
        );
    },

    DomainExceptionMiddleware::class => function (): DomainExceptionMiddleware {
        return new DomainExceptionMiddleware;
    },

    ValidationExceptionMiddleware::class => function (): ValidationExceptionMiddleware {
        return new ValidationExceptionMiddleware;
    },

    HomeAction::class => function (ContainerInterface $container): HomeAction {
        return new HomeAction(
            $container->get(Settings::class)
        );
    },

    TextUpdateAction::class => function (ContainerInterface $container): TextUpdateAction {
        return new TextUpdateAction(
            $container->get(TextEditHandler::class),
            $container->get(Validator::class)
        );
    },

    TextsReadAction::class => function (ContainerInterface $container): TextsReadAction {
        return new TextsReadAction(
            $container->get(TextsReadHandler::class)
        );
    },

    MenuReadAction::class => function (ContainerInterface $container): MenuReadAction {
        return new MenuReadAction(
            $container->get(MenuReadHandler::class)
        );
    },

    ProjectsReadAction::class => function (ContainerInterface $container): ProjectsReadAction {
        return new ProjectsReadAction(
            $container->get(ProjectsReadHandler::class)
        );
    },

    JobsReadAction::class => function (ContainerInterface $container): JobsReadAction {
        return new JobsReadAction(
            $container->get(JobsReadHandler::class)
        );
    },

    LanguagesReadAction::class => function (ContainerInterface $container): LanguagesReadAction {
        return new LanguagesReadAction(
            $container->get(LanguagesReadHandler::class)
        );
    },

    ContactAction::class => function (ContainerInterface $container): ContactAction {
        return new ContactAction(
            $container->get(SupportContactHandler::class),
            $container->get(Validator::class)
        );
    },

    'config' => [
        'validator' => [
            'path' => ROOT_DIR . '/src/Infrastructure/translations',
        ],
    ],
];