<?php

declare(strict_types=1);

namespace Api\Data\Fixture;

use Api\Infrastructure\Model\Sort\Sort;
use Api\Model\Language\Entity\Language\Code;
use Api\Model\Language\Entity\Language\Language;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

final class LanguageFixture extends AbstractFixture
{
    private $english;
    private $russian;

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $russian = $this->getRussian();
        $russian->publish();
        $english = $this->getEnglish();
        $english->publish();

        $manager->persist($russian);
        $manager->persist($english);

        $manager->flush();

        $this->addReference('language-ru', $russian);
        $this->addReference('language-en', $english);
    }

    /**
     * @return Language
     * @throws Exception
     */
    public function getRussian(): Language
    {
        if (null === $this->russian) {
            $this->russian = new Language(
                new Code('ru'),
                'Рус',
                new Sort(1)
            );
        }

        return $this->russian;
    }

    /**
     * @return Language
     * @throws Exception
     */
    public function getEnglish(): Language
    {
        if (null === $this->english) {
            $this->english = new Language(
                new Code('en'),
                'Eng',
                new Sort(2)
            );
        }

        return $this->english;
    }
}
