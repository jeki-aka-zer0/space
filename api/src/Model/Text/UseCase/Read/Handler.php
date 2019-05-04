<?php

declare(strict_types=1);

namespace Api\Model\Text\UseCase\Read;

use Api\Model\Text\Service\Text\TextsCollection;
use Api\ReadModel\Text\TextReadRepository;

final class Handler
{
    private $languages;

    public function __construct(TextReadRepository $languages)
    {
        $this->languages = $languages;
    }

    public function handle(): TextsCollection
    {
        $texts = $this->languages->all();
        return new TextsCollection($texts);
    }
}
