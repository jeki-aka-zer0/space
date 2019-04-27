<?php

declare(strict_types=1);

namespace Api\Data\Fixture;

use Api\Model\Text\Entity\Text\Text;
use Api\Model\Text\Entity\Text\TextId;
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
            TextId::next(),
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
