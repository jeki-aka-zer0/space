<?php

declare(strict_types=1);

namespace Api\Infrastructure\Framework\Settings;

use Api\Model\Language\Entity\Language\Code;
use RuntimeException;

final class Settings
{
    private $language;

    public function __construct(array $settings)
    {
        foreach ($settings as $field => $value) {
            $method = 'set' . ucfirst($field);
            if (false === method_exists($this, $method)) {
                throw new RuntimeException("Field '{$field}' does not exists.'");
            }

            $this->{$method}($value);
        }
    }

    public function setLanguage(Code $code): void
    {
        $this->language = $code;
    }

    public function getLanguage(): Code
    {
        return $this->language;
    }
}
