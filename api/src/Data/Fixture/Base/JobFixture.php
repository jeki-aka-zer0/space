<?php

declare(strict_types=1);

namespace Api\Data\Fixture\Base;

use Api\Infrastructure\Model\Id\Id;
use Api\Infrastructure\Model\Sort\Sort;
use Api\Model\Language\Entity\Language\Language;
use Api\Model\Job\Entity\Job\Job;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

abstract class JobFixture extends AbstractFixture implements OrderedFixtureInterface
{
    private $frontEndDeveloperRu;
    private $frontEndDeveloperEn;

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $manager->clear();

        $frontEndDeveloperRu = $this->getFrontEndDeveloperRu();
        $frontEndDeveloperEn = $this->getFrontEndDeveloperEn();

        $manager->persist($frontEndDeveloperRu);
        $manager->persist($frontEndDeveloperEn);

        $manager->flush();
    }

    /**
     * @return Job
     * @throws Exception
     */
    public function getFrontEndDeveloperRu(): Job
    {
        if (null === $this->frontEndDeveloperRu) {
            $this->frontEndDeveloperRu = new Job(
                Id::next(),
                $this->getLanguageRu(),
                'Front-End разработчик',
                '1-3 года',
                <<<HTML
<p>Ты толжен знать HTML.</p>
HTML
                ,
                new Sort(1)
            );
            $this->frontEndDeveloperRu->publish();
        }

        return $this->frontEndDeveloperRu;
    }

    /**
     * @return Job
     * @throws Exception
     */
    public function getFrontEndDeveloperEn(): Job
    {
        if (null === $this->frontEndDeveloperEn) {
            $this->frontEndDeveloperEn = new Job(
                Id::next(),
                $this->getLanguageEn(),
                'Front-End developer',
                '1-3 years',
                <<<HTML
<p>You should know HTML.</p>
HTML
                ,
                new Sort(2)
            );
            $this->frontEndDeveloperEn->publish();
        }

        return $this->frontEndDeveloperEn;
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
        return 2;
    }
}
