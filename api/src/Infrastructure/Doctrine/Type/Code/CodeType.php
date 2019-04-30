<?php

declare(strict_types=1);

namespace Api\Infrastructure\Doctrine\Type\Code;

use Api\Model\Language\Entity\Language\Code;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class CodeType extends StringType
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

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getVarcharTypeDeclarationSQL([
            'length' => '2',
            'fixed' => true,
        ]);
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
}
