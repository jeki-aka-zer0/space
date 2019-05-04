<?php

declare(strict_types=1);

namespace Api\Infrastructure\Doctrine\Type\Status;

use Api\Infrastructure\Model\Status\Status;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

final class StatusType extends Type
{
    public const NAME = 'status';
    private const DEFAULT_LENGTH = 16;

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value instanceof Status ? $value->getStatus() : $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return empty($value) ? null : new Status($value);
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
        if (null === $fieldDeclaration['length']) {
            $fieldDeclaration['length'] = self::DEFAULT_LENGTH;
        }

        $fieldDeclaration['fixed'] = true;

        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }
}
