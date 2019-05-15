<?php

declare(strict_types=1);

namespace Api\Data\Fixture\Base;

use Api\Infrastructure\Model\Id\Id;
use Api\Infrastructure\Model\Sort\Sort;
use Api\Model\Language\Entity\Language\Language;
use Api\Model\Menu\Entity\Item\Menu;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

abstract class MenuFixture extends AbstractFixture implements OrderedFixtureInterface
{
    private $homeRu;
    private $homeEn;
    private const SLUG_HOME = 'home';

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $manager->clear();

        $homeRu = $this->getHomeRu();
        $homeEn = $this->getHomeEn();

        $manager->persist($homeRu);
        $manager->persist($homeEn);

        $manager->flush();
    }

    /**
     * @return Menu
     * @throws Exception
     */
    public function getHomeRu(): Menu
    {
        if (null === $this->homeRu) {
            $this->homeRu = new Menu(
                Id::next(),
                $this->getLanguageRu(),
                'Главная',
                self::SLUG_HOME,
                new Sort(1)
            );
            $this->homeRu->publish();
        }

        return $this->homeRu;
    }

    /**
     * @return Menu
     * @throws Exception
     */
    public function getHomeEn(): Menu
    {
        if (null === $this->homeEn) {
            $this->homeEn = new Menu(
                Id::next(),
                $this->getLanguageEn(),
                'Home',
                self::SLUG_HOME,
                new Sort(2)
            );
            $this->homeEn->publish();
        }

        return $this->homeEn;
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

    public function getOrder(): int
    {
        return 3;
    }
}
