<?php

declare(strict_types=1);

namespace Api\Test\Unit\Model\Text\Entity\Text;

use Api\Infrastructure\Model\Id\Id;
use Api\Infrastructure\Model\Sort\Sort;
use Api\Model\Language\Entity\Language\Code;
use Api\Model\Language\Entity\Language\Language;
use Api\Model\Text\Entity\Text\Text;
use PHPUnit\Framework\TestCase;

final class TextTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testEdit(): void
    {
        $id = 'some-id';
        $name = 'Some name';
        $slug = 'some-name';
        $content = 'Some content';
        $textId = new Id($id);
        $language = new Language(new Code('ua'), 'Укр', new Sort(1));
        $text = new Text($textId, $language, $name, $slug, $content);

        $newName = 'some-new-name';
        $newContent = 'some-new-content';
        $text->edit($newName, $newContent);

        self::assertEquals($newName, $text->getName());
        self::assertEquals($newContent, $text->getContent());
    }
}
