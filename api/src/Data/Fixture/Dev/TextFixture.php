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
    const SLUG_VALUES = 'values';
    const SLUG_PROJECTS = 'projects';
    const SLUG_JOBS = 'jobs';

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
        $valuesRu = $this->getValuesRu();
        $valuesEn = $this->getValuesEn();
        $projectsRu = $this->getProjectsRu();
        $projectsEn = $this->getProjectsEn();
        $jobsRu = $this->getJobsRu();
        $jobsEn = $this->getJobsEn();

        $manager->persist($greetingRu);
        $manager->persist($greetingEn);
        $manager->persist($navigationRu);
        $manager->persist($navigationEn);
        $manager->persist($aboutRu);
        $manager->persist($aboutEn);
        $manager->persist($valuesRu);
        $manager->persist($valuesEn);
        $manager->persist($projectsRu);
        $manager->persist($projectsEn);
        $manager->persist($jobsRu);
        $manager->persist($jobsEn);

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
            'Используйте клавиши на клавиатуре, чтобы начать перемещение по сайту.'
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
            'Navigation',
            self::SLUG_NAVIGATION,
            'Use the keys on the keyboard to start navigating the site.'
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
            'О нас',
            self::SLUG_ABOUT,
            'Мы - самые классные.'
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
            'About',
            self::SLUG_ABOUT,
            'We are the best.'
        );
        $aboutEn->publish();

        return $aboutEn;
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getValuesRu(): Text
    {
        $valuesRu = new Text(
            Id::next(),
            $this->getLanguageRu(),
            'Наши ценности',
            self::SLUG_VALUES,
            'Это конечно же деньги!'
        );
        $valuesRu->publish();

        return $valuesRu;
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getValuesEn(): Text
    {
        $valuesEn = new Text(
            Id::next(),
            $this->getLanguageEn(),
            'Our values',
            self::SLUG_VALUES,
            'This is of course money!'
        );
        $valuesEn->publish();

        return $valuesEn;
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getProjectsRu(): Text
    {
        $projectsRu = new Text(
            Id::next(),
            $this->getLanguageRu(),
            'Наши проекты',
            self::SLUG_PROJECTS,
            ''
        );
        $projectsRu->publish();

        return $projectsRu;
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getProjectsEn(): Text
    {
        $projectsEn = new Text(
            Id::next(),
            $this->getLanguageEn(),
            'Our projects',
            self::SLUG_PROJECTS,
            ''
        );
        $projectsEn->publish();

        return $projectsEn;
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getJobsRu(): Text
    {
        $jobsRu = new Text(
            Id::next(),
            $this->getLanguageRu(),
            'Хочешь в команду?',
            self::SLUG_JOBS,
            'Присылай резюме!'
        );
        $jobsRu->publish();

        return $jobsRu;
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getJobsEn(): Text
    {
        $jobsEn = new Text(
            Id::next(),
            $this->getLanguageEn(),
            'Our jobs',
            self::SLUG_JOBS,
            'Send CV!'
        );
        $jobsEn->publish();

        return $jobsEn;
    }
}
