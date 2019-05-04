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
    private $textRu;
    private $textEn;

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        /**
         * @var Language $languageRu
         * @var Language $languageEn
         */
        $languageRu = $this->getReference('language-ru');
        $languageEn = $this->getReference('language-en');
        $slug = 'greeting';

        $this->textRu = new Text(
            Id::next(),
            $languageRu,
            'Здравствуйте',
            $slug,
            'Добро пожаловать в Космос'
        );

        $this->textEn = new Text(
            Id::next(),
            $languageEn,
            'Hello',
            $slug,
            'Welcome to Cosmos'
        );

        $manager->persist($this->textRu);
        $manager->persist($this->textEn);

        $manager->flush();
    }

    public function getTextRu(): Text
    {
        return $this->textRu;
    }

    public function getTextEn(): Text
    {
        return $this->textEn;
    }
}
