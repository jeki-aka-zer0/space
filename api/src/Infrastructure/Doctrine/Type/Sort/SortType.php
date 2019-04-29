<?php

declare(strict_types=1);

namespace Api\Infrastructure\Doctrine\Type\Sort;

use Api\Infrastructure\Model\Sort\Sort;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\IntegerType;

final class SortType extends IntegerType
{
    public const NAME = 'sort';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value instanceof Sort ? $value->getPosition() : $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return empty($value) ? null : new Sort($value);
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getIntegerTypeDeclarationSQL([
            'unsigned' => true
        ]);
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return true;
    }
}
