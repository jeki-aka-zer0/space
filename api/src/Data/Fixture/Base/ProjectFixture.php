<?php

declare(strict_types=1);

namespace Api\Data\Fixture\Base;

use Api\Infrastructure\Model\Id\Id;
use Api\Infrastructure\Model\Sort\Sort;
use Api\Model\Language\Entity\Language\Language;
use Api\Model\Project\Entity\Project\Project;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

abstract class ProjectFixture extends AbstractFixture
{
    private $adamantLabRu;
    private $adamantLabEn;

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $manager->clear();

        $adamantLabRu = $this->getAdamantLabRu();
        $adamantLabEn = $this->getAdamantLabEn();

        $manager->persist($adamantLabRu);
        $manager->persist($adamantLabEn);

        $manager->flush();
    }

    /**
     * @return Project
     * @throws Exception
     */
    public function getAdamantLabRu(): Project
    {
        if (null === $this->adamantLabRu) {
            $this->adamantLabRu = new Project(
                Id::next(),
                $this->getLanguageRu(),
                'Adamant lab',
                <<<HTML
<p>Adamant lab - это казино.</p>
HTML
                ,
                new Sort(1)
            );
            $this->adamantLabRu->publish();
        }

        return $this->adamantLabRu;
    }

    /**
     * @return Project
     * @throws Exception
     */
    public function getAdamantLabEn(): Project
    {
        if (null === $this->adamantLabEn) {
            $this->adamantLabEn = new Project(
                Id::next(),
                $this->getLanguageEn(),
                'Adamant lab',
                <<<HTML
<p>Adamant lab - it is a casino.</p>
HTML
                ,
                new Sort(2)
            );
            $this->adamantLabEn->publish();
        }

        return $this->adamantLabEn;
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
