<?php

declare(strict_types=1);

namespace Api\Model\Menu\UseCase\Read;

use Api\Infrastructure\Framework\Settings\Settings;
use Api\Model\Menu\Service\Menu\MenuCollection;
use Api\ReadModel\Menu\MenuReadRepository;

final class Handler
{
    private $menu;
    private $settings;

    public function __construct(MenuReadRepository $menu, Settings $settings)
    {
        $this->menu = $menu;
        $this->settings = $settings;
    }

    public function handle(): MenuCollection
    {
        $langCode = $this->settings->getLanguage();
        $menu = $this->menu->allActive($langCode);
        return new MenuCollection($menu);
    }
}
