<?php

declare(strict_types=1);

namespace Api\Data\Fixture;

use Api\Infrastructure\Model\Id\Id;
use Api\Model\Language\Entity\Language\Language;
use Api\Model\Text\Entity\Text\Text;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

final class TextFixture extends AbstractFixture
{
    private const SLUG_GREETING = 'greeting';
    private $textRu;
    private $textEn;

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $textRu = $this->getTextRu();
        $textRu->publish();

        $textEn = $this->getTextEn();
        $textEn->publish();

        $manager->persist($textRu);
        $manager->persist($textEn);

        $manager->flush();
    }

    /**
     * @return Text
     * @throws Exception
     */
    public function getTextRu(): Text
    {
        if (null === $this->textRu) {
            /**
             * @var Language $languageRu
             */
            $languageRu = $this->getReference('language-ru');
            $this->textRu = new Text(
                Id::next(),
                $languageRu,
                'Здравствуйте',
                self::SLUG_GREETING,
                'Добро пожаловать в Космос'
            );
        }

        return $this->textRu;
    }

    /**
     * @return Text
     * @throws Exception
     */
    public function getTextEn(): Text
    {
        if (null === $this->textEn) {
            /**
             * @var Language $languageEn
             */
            $languageEn = $this->getReference('language-en');
            $this->textEn = new Text(
                Id::next(),
                $languageEn,
                'Hello',
                self::SLUG_GREETING,
                'Welcome to Cosmos'
            );
        }

        return $this->textEn;
    }
}
