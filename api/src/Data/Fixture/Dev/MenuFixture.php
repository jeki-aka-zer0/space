<?php

declare(strict_types=1);

namespace Api\Data\Fixture\Dev;

use Api\Infrastructure\Model\Id\Id;
use Api\Infrastructure\Model\Sort\Sort;
use Api\Model\Menu\Entity\Item\Menu;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

final class MenuFixture extends \Api\Data\Fixture\Base\MenuFixture
{
    const SLUG_VALUES = 'values';
    const SLUG_PROJECTS = 'projects';
    const SLUG_JOBS = 'jobs';
    const SLUG_CONTACTS = 'contacts';

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $aboutRu = $this->getAboutRu();
        $aboutEn = $this->getAboutEn();
        $valuesRu = $this->getValuesRu();
        $valuesEn = $this->getValuesEn();
        $projectsRu = $this->getProjectsRu();
        $projectsEn = $this->getProjectsEn();
        $jobsRu = $this->getJobsRu();
        $jobsEn = $this->getJobsEn();
        $contactsRu = $this->getContactsRu();
        $contactsEn = $this->getContactsEn();

        $manager->persist($aboutRu);
        $manager->persist($aboutEn);
        $manager->persist($valuesRu);
        $manager->persist($valuesEn);
        $manager->persist($projectsRu);
        $manager->persist($projectsEn);
        $manager->persist($jobsRu);
        $manager->persist($jobsEn);
        $manager->persist($contactsRu);
        $manager->persist($contactsEn);

        $manager->flush();
    }

    /**
     * @return Menu
     * @throws Exception
     */
    private function getValuesRu(): Menu
    {
        $valuesRu = new Menu(
            Id::next(),
            $this->getLanguageRu(),
            'Наши ценности',
            self::SLUG_VALUES,
            new Sort(3)
        );
        $valuesRu->publish();

        return $valuesRu;
    }

    /**
     * @return Menu
     * @throws Exception
     */
    private function getValuesEn(): Menu
    {
        $valuesEn = new Menu(
            Id::next(),
            $this->getLanguageEn(),
            'Our values',
            self::SLUG_VALUES,
            new Sort(4)
        );
        $valuesEn->publish();

        return $valuesEn;
    }

    /**
     * @return Menu
     * @throws Exception
     */
    private function getProjectsRu(): Menu
    {
        $projectsRu = new Menu(
            Id::next(),
            $this->getLanguageRu(),
            'Наши проекты',
            self::SLUG_PROJECTS,
            new Sort(5)
        );
        $projectsRu->publish();

        return $projectsRu;
    }

    /**
     * @return Menu
     * @throws Exception
     */
    private function getProjectsEn(): Menu
    {
        $projectsEn = new Menu(
            Id::next(),
            $this->getLanguageEn(),
            'Our projects',
            self::SLUG_PROJECTS,
            new Sort(6)
        );
        $projectsEn->publish();

        return $projectsEn;
    }

    /**
     * @return Menu
     * @throws Exception
     */
    private function getJobsRu(): Menu
    {
        $jobsRu = new Menu(
            Id::next(),
            $this->getLanguageRu(),
            'Вакансии',
            self::SLUG_JOBS,
            new Sort(7)
        );
        $jobsRu->publish();

        return $jobsRu;
    }

    /**
     * @return Menu
     * @throws Exception
     */
    private function getJobsEn(): Menu
    {
        $jobsEn = new Menu(
            Id::next(),
            $this->getLanguageEn(),
            'Jobs',
            self::SLUG_JOBS,
            new Sort(8)
        );
        $jobsEn->publish();

        return $jobsEn;
    }

    /**
     * @return Menu
     * @throws Exception
     */
    private function getContactsRu(): Menu
    {
        $contactsRu = new Menu(
            Id::next(),
            $this->getLanguageRu(),
            'Контакты',
            self::SLUG_CONTACTS,
            new Sort(9)
        );
        $contactsRu->publish();

        return $contactsRu;
    }

    /**
     * @return Menu
     * @throws Exception
     */
    private function getContactsEn(): Menu
    {
        $contactsEn = new Menu(
            Id::next(),
            $this->getLanguageEn(),
            'Contacts',
            self::SLUG_CONTACTS,
            new Sort(10)
        );
        $contactsEn->publish();

        return $contactsEn;
    }
}
