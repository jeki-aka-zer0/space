<?php

declare(strict_types=1);

namespace Api\Data\Fixture;

use Api\Model\Text\Entity\Text\Text;
use Api\Model\Text\Entity\Text\TextId;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

class TextFixture extends AbstractFixture
{
    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $user = new Text(
            TextId::next(),
            'some-name',
            'some-content'
        );

        $manager->persist($user);

        $manager->flush();
    }
}
