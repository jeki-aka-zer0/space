<?php

declare(strict_types=1);

namespace Api\Infrastructure\Doctrine\Type\Id;

use Api\Infrastructure\Model\Id\Id;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;

final class IdType extends GuidType
{
    public const NAME = 'id';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value instanceof Id ? $value->getId() : $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return empty($value) ? null : new Id($value);
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
}
