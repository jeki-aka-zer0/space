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
    private const SLUG_ABOUT = 'about';
    private const SLUG_VALUES = 'values';
    private const SLUG_PROJECTS = 'projects';
    private const SLUG_JOBS = 'jobs';
    private const SLUG_CONTACTS = 'contacts';

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $manager->clear();

        $homeRu = $this->getHomeRu();
        $homeEn = $this->getHomeEn();
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

        $manager->persist($homeRu);
        $manager->persist($homeEn);
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
    public function getAboutRu(): Menu
    {
        $aboutRu = new Menu(
            Id::next(),
            $this->getLanguageRu(),
            'О нас',
            self::SLUG_ABOUT,
            new Sort(3)
        );
        $aboutRu->publish();

        return $aboutRu;
    }

    /**
     * @return Menu
     * @throws Exception
     */
    public function getAboutEn(): Menu
    {
        $aboutEn = new Menu(
            Id::next(),
            $this->getLanguageEn(),
            'About us',
            self::SLUG_ABOUT,
            new Sort(4)
        );
        $aboutEn->publish();

        return $aboutEn;
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
            new Sort(5)
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
            new Sort(6)
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
            new Sort(7)
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
            new Sort(8)
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
            new Sort(9)
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
            new Sort(10)
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
            new Sort(11)
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
            new Sort(12)
        );
        $contactsEn->publish();

        return $contactsEn;
    }
}
