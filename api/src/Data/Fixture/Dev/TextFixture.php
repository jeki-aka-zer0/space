<?php

declare(strict_types=1);

namespace Api\Data\Fixture\Dev;

use Api\Infrastructure\Model\Id\Id;
use Api\Model\Text\Entity\Text\Text;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

final class TextFixture extends \Api\Data\Fixture\Base\TextFixture
{
    const SLUG_SLOGAN = 'slogan';
    const SLUG_NAVIGATION = 'navigation';
    const SLUG_ABOUT = 'about';
    const SLUG_VALUES = 'values';
    const SLUG_VALUE_ITEMS = 'value-items';
    const SLUG_PROJECTS = 'projects';
    const SLUG_JOBS = 'jobs';
    const SLUG_APPLY_FOR_JOB = 'slug-apply-for-job';
    const SLUG_CONTACTS = 'contacts';

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $manager->clear();

        $greetingRu = $this->getGreetingRu();
        $greetingEn = $this->getGreetingEn();
        $sloganRu = $this->getSloganRu();
        $sloganEn = $this->getSloganEn();
        $navigationRu = $this->getNavigationRu();
        $navigationEn = $this->getNavigationEn();
        $aboutRu = $this->getAboutRu();
        $aboutEn = $this->getAboutEn();
        $valuesRu = $this->getValuesRu();
        $valuesEn = $this->getValuesEn();
        $valueItemsRu = $this->getValueItemsRu();
        $valueItemsEn = $this->getValueItemsEn();
        $projectsRu = $this->getProjectsRu();
        $projectsEn = $this->getProjectsEn();
        $jobsRu = $this->getJobsRu();
        $jobsEn = $this->getJobsEn();
        $applyForJobRu = $this->getApplyForJobRu();
        $applyForJobEn = $this->getApplyForJobEn();
        $contactsRu = $this->getContactsRu();
        $contactsEn = $this->getContactsEn();

        $manager->persist($greetingRu);
        $manager->persist($greetingEn);
        $manager->persist($sloganRu);
        $manager->persist($sloganEn);
        $manager->persist($navigationRu);
        $manager->persist($navigationEn);
        $manager->persist($aboutRu);
        $manager->persist($aboutEn);
        $manager->persist($valuesRu);
        $manager->persist($valuesEn);
        $manager->persist($valueItemsRu);
        $manager->persist($valueItemsEn);
        $manager->persist($projectsRu);
        $manager->persist($projectsEn);
        $manager->persist($jobsRu);
        $manager->persist($jobsEn);
        $manager->persist($applyForJobRu);
        $manager->persist($applyForJobEn);
        $manager->persist($contactsRu);
        $manager->persist($contactsEn);

        $manager->flush();
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getSloganRu(): Text
    {
        $sloganRu = new Text(
            Id::next(),
            $this->getLanguageRu(),
            'Слоган',
            self::SLUG_SLOGAN,
            <<<HTML
<p>К будущему — в настоящем</p>
HTML
        );
        $sloganRu->publish();

        return $sloganRu;
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getSloganEn(): Text
    {
        $sloganEn = new Text(
            Id::next(),
            $this->getLanguageEn(),
            'Slogan',
            self::SLUG_SLOGAN,
            <<<HTML
<p>To the future - in the present</p>
HTML
        );
        $sloganEn->publish();

        return $sloganEn;
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
            <<<HTML
<p>Используйте клавиши на клавиатуре, чтобы начать перемещение по сайту.</p>
HTML
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
            <<<HTML
<p>Use the keys on the keyboard to start navigating the site.</p>
HTML
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
            <<<HTML
<p>Мы - самые классные.</p>
HTML
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
            <<<HTML
<p>We are the best.</p>
HTML
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
            <<<HTML
<p>Это конечно же деньги!</p>
HTML
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
            <<<HTML
<p>This is of course money!</p>
HTML
        );
        $valuesEn->publish();

        return $valuesEn;
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getValueItemsRu(): Text
    {
        $valueItemsRu = new Text(
            Id::next(),
            $this->getLanguageRu(),
            'Значения ценностей',
            self::SLUG_VALUE_ITEMS,
            <<<HTML
<p>Качество, Ответственность, Созидание, Мастерство, Опыт, Сила</p>
HTML
        );
        $valueItemsRu->publish();

        return $valueItemsRu;
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getValueItemsEn(): Text
    {
        $valueItemsEn = new Text(
            Id::next(),
            $this->getLanguageEn(),
            'Value items',
            self::SLUG_VALUE_ITEMS,
            <<<HTML
<p>Quality, Responsibility, Creation, Mastery, Experience, Strength</p>
HTML
        );
        $valueItemsEn->publish();

        return $valueItemsEn;
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
            <<<HTML
<p>Присылай резюме!</p>
HTML
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
            'Do you want a team?',
            self::SLUG_JOBS,
            <<<HTML
<p>Send CV!</p>
HTML
        );
        $jobsEn->publish();

        return $jobsEn;
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getApplyForJobRu(): Text
    {
        $applyForJobRu = new Text(
            Id::next(),
            $this->getLanguageRu(),
            'Устроиться на работу',
            self::SLUG_APPLY_FOR_JOB,
            <<<HTML
<p>Не нашел подходящей вакансии?<br>Напиши нам и отправь своё резюме!</p>
HTML
        );
        $applyForJobRu->publish();

        return $applyForJobRu;
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getApplyForJobEn(): Text
    {
        $applyForJobEn = new Text(
            Id::next(),
            $this->getLanguageEn(),
            'Apply for a job',
            self::SLUG_APPLY_FOR_JOB,
            <<<HTML
<p>Didn't find a suitable job?<br>Write us and send your resume!</p>
HTML
        );
        $applyForJobEn->publish();

        return $applyForJobEn;
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getContactsRu(): Text
    {
        $contactsRu = new Text(
            Id::next(),
            $this->getLanguageRu(),
            'Что-то ещё?',
            self::SLUG_CONTACTS,
            <<<HTML
<p>Пиши, звони.</p>
HTML
        );
        $contactsRu->publish();

        return $contactsRu;
    }

    /**
     * @return Text
     * @throws Exception
     */
    private function getContactsEn(): Text
    {
        $contactsEn = new Text(
            Id::next(),
            $this->getLanguageEn(),
            'Something else?',
            self::SLUG_CONTACTS,
            <<<HTML
<p>Write, call.<p>
HTML
        );
        $contactsEn->publish();

        return $contactsEn;
    }
}
