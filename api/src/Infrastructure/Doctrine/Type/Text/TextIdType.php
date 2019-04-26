<?php

declare(strict_types=1);

namespace Api\Infrastructure\Doctrine\Type\Text;

use Api\Model\Text\Entity\Text\TextId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;

final class TextIdType extends GuidType
{
    public const NAME = 'text_text_id';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value instanceof TextId ? $value->getId() : $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return empty($value) ? null : new TextId($value);
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
