<?php

declare(strict_types=1);

namespace Api\Test\Feature;

use Slim\Exception\MethodNotAllowedException;
use Slim\Exception\NotFoundException;

final class HomeTest extends WebTestCase
{
    /**
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     */
    public function testSuccess(): void
    {
        $response = $this->get('/');

        self::assertEquals(200, $response->getStatusCode());
        self::assertJson($content = $response->getBody()->getContents());

        $data = json_decode($content, true);

        self::assertEquals([
            'name' => 'Cosmos business card API',
            'version' => '1.0',
        ], $data);
    }
}
