<?php

declare(strict_types=1);

namespace Api\Data\Fixture;

use Api\Infrastructure\Model\Id\Id;
use Api\Model\Text\Entity\Text\Text;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

final class TextFixture extends AbstractFixture
{
    private $text;

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $this->text = new Text(
            Id::next(),
            'some-name',
            'some-content'
        );

        $manager->persist($this->text);

        $manager->flush();
    }

    public function getText(): Text
    {
        return $this->text;
    }
}
