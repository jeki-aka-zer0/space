<?php

declare(strict_types=1);

namespace Api\Data\Fixture\Dev;

use Api\Infrastructure\Model\Id\Id;
use Api\Infrastructure\Model\Sort\Sort;
use Api\Model\Project\Entity\Project\Project;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

final class ProjectFixture extends \Api\Data\Fixture\Base\ProjectFixture
{
    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $manager->clear();

        $adamantLabRu = $this->getAdamantLabRu();
        $adamantLabEn = $this->getAdamantLabEn();
        $lookMeRu = $this->getLookMeRu();
        $lookMeEn = $this->getLookMeEn();
        $bellaRu = $this->getBellaRu();
        $bellaEn = $this->getBellaEn();
        $pulseGamesRu = $this->getPulseGamesRu();
        $pulseGamesEn = $this->getPulseGamesEn();

        $manager->persist($adamantLabRu);
        $manager->persist($adamantLabEn);
        $manager->persist($lookMeRu);
        $manager->persist($lookMeEn);
        $manager->persist($bellaRu);
        $manager->persist($bellaEn);
        $manager->persist($pulseGamesRu);
        $manager->persist($pulseGamesEn);

        $manager->flush();
    }

    /**
     * @return Project
     * @throws Exception
     */
    private function getLookMeRu(): Project
    {
        $lookMeRu = new Project(
            Id::next(),
            $this->getLanguageRu(),
            'LookMe',
            <<<HTML
<p>LookMe - это чат.</p>
HTML
            ,
            new Sort(3)
        );
        $lookMeRu->publish();

        return $lookMeRu;
    }

    /**
     * @return Project
     * @throws Exception
     */
    private function getLookMeEn(): Project
    {
        $lookMeEn = new Project(
            Id::next(),
            $this->getLanguageEn(),
            'LookMe',
            <<<HTML
<p>LookMe - it is a chat.</p>
HTML
            ,
            new Sort(4)
        );
        $lookMeEn->publish();

        return $lookMeEn;
    }

    /**
     * @return Project
     * @throws Exception
     */
    private function getBellaRu(): Project
    {
        $bellaRu = new Project(
            Id::next(),
            $this->getLanguageRu(),
            'Bella',
            <<<HTML
<p>Bella - это робот.</p>
HTML
            ,
            new Sort(5)
        );
        $bellaRu->publish();

        return $bellaRu;
    }

    /**
     * @return Project
     * @throws Exception
     */
    private function getBellaEn(): Project
    {
        $bellaEn = new Project(
            Id::next(),
            $this->getLanguageEn(),
            'Bella',
            <<<HTML
<p>Bella - it is a robot.</p>
HTML
            ,
            new Sort(6)
        );
        $bellaEn->publish();

        return $bellaEn;
    }

    /**
     * @return Project
     * @throws Exception
     */
    private function getPulseGamesRu(): Project
    {
        $pulseGamesRu = new Project(
            Id::next(),
            $this->getLanguageRu(),
            'Pulse Games',
            <<<HTML
<p>Pulse Games - это гейм дев.</p>
HTML
            ,
            new Sort(7)
        );
        $pulseGamesRu->publish();

        return $pulseGamesRu;
    }

    /**
     * @return Project
     * @throws Exception
     */
    private function getPulseGamesEn(): Project
    {
        $pulseGamesEn = new Project(
            Id::next(),
            $this->getLanguageEn(),
            'Pulse Games',
            <<<HTML
<p>Pulse Games - it is a game dev.</p>
HTML
            ,
            new Sort(8)
        );
        $pulseGamesEn->publish();

        return $pulseGamesEn;
    }
}
