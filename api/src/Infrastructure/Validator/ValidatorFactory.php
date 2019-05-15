<?php

declare(strict_types=1);

namespace Api\Infrastructure\Validator;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class ValidatorFactory
{
    private $translator;

    public function __construct(TranslatorFactory $translatorFactory)
    {
        $this->translator = $translatorFactory->build();
    }

    public function build(): ValidatorInterface
    {
        AnnotationRegistry::registerLoader('class_exists');
        return Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->setTranslator($this->translator)
            ->getValidator();
    }
}
