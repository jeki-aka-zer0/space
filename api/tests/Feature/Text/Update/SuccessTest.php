<?php

declare(strict_types=1);

namespace Api\Test\Feature\Text\Update;

use Api\Data\Fixture\TextFixture;
use Api\Test\Feature\WebTestCase;
use Slim\Exception\MethodNotAllowedException;
use Slim\Exception\NotFoundException;

final class SuccessTest extends WebTestCase
{
    protected function setUp(): void
    {
        $this->loadFixtures([
            'text' => TextFixture::class,
        ]);

        parent::setUp();
    }

    /**
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     */
    public function testSuccess(): void
    {
        /**
         * @var TextFixture $textFixture
         */
        $textFixture = $this->getFixture('text');
        $text = $textFixture->getText();
        $id = $text->getId()->getId();


        $response = $this->post("/text/{$id}", [
            'name' => 'Some new name',
            'content' => 'Some new content',
        ]);

        self::assertEquals(201, $response->getStatusCode());
        self::assertJson($content = $response->getBody()->getContents());

        $data = json_decode($content, true);

        self::assertEquals([
            'id' => $id,
        ], $data);
    }
}
