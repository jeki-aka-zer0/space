<?php

declare(strict_types=1);

namespace Api\Model\Language\UseCase\Read;

use Api\Model\Language\Service\Language\LanguagesCollection;
use Api\ReadModel\Language\LanguageReadRepository;

final class Handler
{
    private $languages;

    public function __construct(LanguageReadRepository $languages)
    {
        $this->languages = $languages;
    }

    public function handle(): LanguagesCollection
    {
        $languages = $this->languages->all();
        return new LanguagesCollection($languages);
    }
}
