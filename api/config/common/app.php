<?php

declare(strict_types=1);

use Api\Http\Action\HomeAction;
use Api\Http\Action\Text\UpdateAction;
use Api\Http\Middleware\BodyParamsMiddleware;
use Api\Http\Middleware\DomainExceptionMiddleware;
use Api\Http\Middleware\ValidationExceptionMiddleware;
use Api\Http\Validator\Validator;
use Api\Model\Text\UseCase\Edit\Handler;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Psr\Container\ContainerInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

return [
    ValidatorInterface::class => function (): ValidatorInterface {
        AnnotationRegistry::registerLoader('class_exists');
        return Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();
    },

    Validator::class => function (ContainerInterface $container): Validator {
        return new Validator(
            $container->get(ValidatorInterface::class)
        );
    },

    BodyParamsMiddleware::class => function (): BodyParamsMiddleware {
        return new BodyParamsMiddleware;
    },

    DomainExceptionMiddleware::class => function (): DomainExceptionMiddleware {
        return new DomainExceptionMiddleware;
    },

    ValidationExceptionMiddleware::class => function (): ValidationExceptionMiddleware {
        return new ValidationExceptionMiddleware;
    },

    HomeAction::class => function (): HomeAction {
        return new HomeAction;
    },

    UpdateAction::class => function (ContainerInterface $container): UpdateAction {
        return new UpdateAction(
            $container->get(Handler::class),
            $container->get(Validator::class)
        );
    },
];