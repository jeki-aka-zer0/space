<?php

declare(strict_types=1);

namespace Api\Infrastructure\Doctrine\Type\Code;

use Api\Model\Language\Entity\Language\Code;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

final class CodeType extends Type
{
    public const NAME = 'code';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value instanceof Code ? $value->getCode() : $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return empty($value) ? null : new Code($value);
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        $fieldDeclaration['length'] = Code::LENGTH;
        $fieldDeclaration['fixed'] = true;

        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }
}
