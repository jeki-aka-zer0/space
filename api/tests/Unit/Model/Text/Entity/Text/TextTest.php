<?php

declare(strict_types=1);

namespace Api\Test\Unit\Model\Text\Entity\Text;

use Api\Infrastructure\Model\Id\Id;
use Api\Model\Text\Entity\Text\Text;
use PHPUnit\Framework\TestCase;

final class TextTest extends TestCase
{
    public function testEdit(): void
    {
        $id = 'some-id';
        $name = 'some-name';
        $content = 'some-content';
        $textId = new Id($id);
        $text = new Text($textId, $name, $content);

        $newName = 'some-new-name';
        $newContent = 'some-new-content';
        $text->edit($newName, $newContent);

        self::assertEquals($newName, $text->getName());
        self::assertEquals($newContent, $text->getContent());
    }
}
