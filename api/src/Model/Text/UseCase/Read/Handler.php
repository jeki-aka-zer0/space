<?php

declare(strict_types=1);

namespace Api\Model\Text\UseCase\Read;

use Api\Infrastructure\Framework\Settings\Settings;
use Api\Model\Text\Service\Text\TextsCollection;
use Api\ReadModel\Text\TextsReadRepository;

final class Handler
{
    private $languages;
    private $settings;

    public function __construct(TextsReadRepository $languages, Settings $settings)
    {
        $this->languages = $languages;
        $this->settings = $settings;
    }

    public function handle(): TextsCollection
    {
        $langCode = $this->settings->getLanguage();
        $texts = $this->languages->all($langCode);
        return new TextsCollection($texts);
    }
}
