<?php

declare(strict_types=1);

namespace Api\Infrastructure\Validator;

use Api\Infrastructure\Framework\Settings\Settings;
use Symfony\Component\Translation\Loader\PhpFileLoader;
use Symfony\Component\Translation\Translator;

final class TranslatorFactory
{
    const FORMAT_PHP = 'php';
    private $settings;
    private $directoryWithTranslations;
    private $translator;

    public function __construct(Settings $settings, string $directoryWithTranslations)
    {
        $this->settings = $settings;
        $this->directoryWithTranslations = $directoryWithTranslations;
    }

    public function build(): Translator
    {
        array_map([$this, 'addResource'], $this->getFilesList());
        return $this->getTranslator();
    }

    private function addResource(string $file): void
    {
        $this->getTranslator()
            ->addResource(
                self::FORMAT_PHP,
                "{$this->directoryWithTranslations}/{$file}",
                $this->getLocale()
            );
    }

    private function getTranslator(): Translator
    {
        if (null === $this->translator) {
            $this->translator = new Translator($this->getLocale());
            $this->translator->addLoader(self::FORMAT_PHP, new PhpFileLoader);
        }

        return $this->translator;
    }

    private function getLocale(): string
    {
        return $this->settings->getLanguage()->getCode();
    }

    private function getFilesList(): array
    {
        return array_diff(scandir($this->directoryWithTranslations), ['.', '..']);
    }
}
