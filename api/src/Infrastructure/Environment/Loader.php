<?php

declare(strict_types=1);

namespace Api\Infrastructure\Environment;

use Symfony\Component\Dotenv\Dotenv;

final class Loader
{
    const FILE_NAME = '.env';

    private $fileNameWithPath;

    public function __construct(string $fileName = self::FILE_NAME)
    {
        $this->setFile($fileName);
    }

    private function setFile(string $fileName): void
    {
        $fileNameWithPath = ROOT_DIR . "/{$fileName}";

        if (false === file_exists($fileNameWithPath)) {
            throw new \RuntimeException('Can\'t find environment file.');
        }

        $this->fileNameWithPath = $fileNameWithPath;
    }

    public function load(): void
    {
        (new Dotenv)->load($this->fileNameWithPath);
    }
}
