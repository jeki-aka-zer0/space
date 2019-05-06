<?php

declare(strict_types=1);

namespace Api\Data\Fixture\Dev;

use Api\Infrastructure\Model\Id\Id;
use Api\Model\Text\Entity\Text\Text;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

final class TextFixture extends \Api\Data\Fixture\Base\TextFixture
{
    const SLUG_NAVIGATION = 'navigation';
    const SLUG_ABOUT = 'about';

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $greetingRu = $this->getGreetingRu();
        $greetingEn = $this->getGreetingEn();
        $navigationRu = $this->getNavigationRu();
        $navigationEn = $this->getNavigationEn();
        $aboutRu = $this->getAboutRu();
        $aboutEn = $this->getAboutEn();

        $manager->persist($greetingRu);
        $manager->persist($greetingEn);
        $manager->persist($navigationRu);
        $manager->persist($navigationEn);
        $manager->persist($aboutRu);
        $manager->persist($aboutEn);

        $manager->flush();
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getNavigationRu(): Text
    {
        $navigationRu = new Text(
            Id::next(),
            $this->getLanguageRu(),
            'Навигация',
            self::SLUG_NAVIGATION,
            'Используйте клавиши на клавиатуре, чтобы начать перемещение по сайту'
        );
        $navigationRu->publish();

        return $navigationRu;
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getNavigationEn(): Text
    {
        $navigationEn = new Text(
            Id::next(),
            $this->getLanguageEn(),
            'Hello',
            self::SLUG_NAVIGATION,
            'Welcome to Cosmos'
        );
        $navigationEn->publish();

        return $navigationEn;
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getAboutRu(): Text
    {
        $aboutRu = new Text(
            Id::next(),
            $this->getLanguageRu(),
            'Навигация',
            self::SLUG_ABOUT,
            'Используйте клавиши на клавиатуре, чтобы начать перемещение по сайту'
        );
        $aboutRu->publish();

        return $aboutRu;
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getAboutEn(): Text
    {
        $aboutEn = new Text(
            Id::next(),
            $this->getLanguageEn(),
            'Hello',
            self::SLUG_ABOUT,
            'Welcome to Cosmos'
        );
        $aboutEn->publish();

        return $aboutEn;
    }
}
