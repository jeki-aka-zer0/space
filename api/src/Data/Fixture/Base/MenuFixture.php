<?php

declare(strict_types=1);

namespace Api\Data\Fixture\Base;

use Api\Infrastructure\Model\Id\Id;
use Api\Infrastructure\Model\Sort\Sort;
use Api\Model\Language\Entity\Language\Language;
use Api\Model\Menu\Entity\Item\Menu;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

abstract class MenuFixture extends AbstractFixture
{
    private $aboutRu;
    private $aboutEn;
    private const SLUG_ABOUT = 'about';

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $aboutRu = $this->getAboutRu();
        $aboutEn = $this->getAboutEn();

        $manager->persist($aboutRu);
        $manager->persist($aboutEn);

        $manager->flush();
    }

    /**
     * @return Menu
     * @throws Exception
     */
    public function getAboutRu(): Menu
    {
        if (null === $this->aboutRu) {
            $this->aboutRu = new Menu(
                Id::next(),
                $this->getLanguageRu(),
                'О нас',
                self::SLUG_ABOUT,
                new Sort(1)
            );
            $this->aboutRu->publish();
        }

        return $this->aboutRu;
    }

    /**
     * @return Menu
     * @throws Exception
     */
    public function getAboutEn(): Menu
    {
        if (null === $this->aboutEn) {
            $this->aboutEn = new Menu(
                Id::next(),
                $this->getLanguageEn(),
                'About us',
                self::SLUG_ABOUT,
                new Sort(2)
            );
            $this->aboutEn->publish();
        }

        return $this->aboutEn;
    }

    protected function getLanguageRu(): Language
    {
        /**
         * @var Language $languageRu
         */
        $languageRu = $this->getReference('language-ru');
        return $languageRu;
    }

    protected function getLanguageEn(): Language
    {
        /**
         * @var Language $languageEn
         */
        $languageEn = $this->getReference('language-en');
        return $languageEn;
    }
}
