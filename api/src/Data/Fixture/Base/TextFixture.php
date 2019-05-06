<?php

declare(strict_types=1);

namespace Api\Data\Fixture\Base;

use Api\Infrastructure\Model\Id\Id;
use Api\Model\Language\Entity\Language\Language;
use Api\Model\Text\Entity\Text\Text;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

abstract class TextFixture extends AbstractFixture
{
    private $greetingRu;
    private $greetingEn;
    private const SLUG_GREETING = 'greeting';

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $greetingRu = $this->getGreetingRu();
        $greetingEn = $this->getGreetingEn();

        $manager->persist($greetingRu);
        $manager->persist($greetingEn);

        $manager->flush();
    }

    /**
     * @return Text
     * @throws Exception
     */
    public function getGreetingRu(): Text
    {
        if (null === $this->greetingRu) {
            /**
             * @var Language $languageRu
             */
            $languageRu = $this->getReference('language-ru');
            $this->greetingRu = new Text(
                Id::next(),
                $languageRu,
                'Здравствуйте',
                self::SLUG_GREETING,
                'Добро пожаловать в Космос'
            );
            $this->greetingRu->publish();
        }

        return $this->greetingRu;
    }

    /**
     * @return Text
     * @throws Exception
     */
    public function getGreetingEn(): Text
    {
        if (null === $this->greetingEn) {
            /**
             * @var Language $languageEn
             */
            $languageEn = $this->getReference('language-en');
            $this->greetingEn = new Text(
                Id::next(),
                $languageEn,
                'Hello',
                self::SLUG_GREETING,
                'Welcome to Cosmos'
            );
            $this->greetingEn->publish();
        }

        return $this->greetingEn;
    }
}