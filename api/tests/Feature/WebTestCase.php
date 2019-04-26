<?php

declare(strict_types=1);

namespace Api\Test\Feature;

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Exception\MethodNotAllowedException;
use Slim\Exception\NotFoundException;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Stream;
use Zend\Diactoros\Uri;

class WebTestCase extends TestCase
{
    private $fixtures = [];

    /**
     * @param string $uri
     * @param array $headers
     * @return ResponseInterface
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     */
    protected function get(string $uri, array $headers = []): ResponseInterface
    {
        return $this->method($uri, 'GET', [], $headers);
    }

    /**
     * @param string $uri
     * @param array $params
     * @param array $headers
     * @return ResponseInterface
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     */
    protected function post(string $uri, array $params = [], array $headers = []): ResponseInterface
    {
        return $this->method($uri, 'POST', $params, $headers);
    }

    /**
     * @param string $uri
     * @param $method
     * @param array $params
     * @param array $headers
     * @return ResponseInterface
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     */
    protected function method(string $uri, $method, array $params = [], array $headers = []): ResponseInterface
    {
        $body = new Stream('php://temp', 'r+');
        $body->write(json_encode($params));
        $body->rewind();

        /**
         * @var ServerRequestInterface $request
         */
        $request = (new ServerRequest)
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Accept', 'application/json')
            ->withUri(new Uri('http://test' . $uri))
            ->withMethod($method)
            ->withBody($body);

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        return $this->request($request);
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     */
    protected function request(ServerRequestInterface $request): ResponseInterface
    {
        $response = $this->app()->process($request, new Response);
        $response->getBody()->rewind();
        return $response;
    }

    protected function loadFixtures(array $fixtures): void
    {
        $container = $this->container();
        $em = $container->get(EntityManagerInterface::class);
        $loader = new Loader;
        foreach ($fixtures as $name => $class) {
            $fixture = $container->has($class)
                ? $container->get($class)
                : new $class;
            $loader->addFixture($fixture);
            $this->fixtures[$name] = $fixture;
        }
        $executor = new ORMExecutor($em, new ORMPurger($em));
        $executor->execute($loader->getFixtures());
    }

    protected function getFixture($name)
    {
        if (!array_key_exists($name, $this->fixtures)) {
            throw new InvalidArgumentException('Undefined fixture ' . $name);
        }
        return $this->fixtures[$name];
    }

    private function app(): App
    {
        $container = $this->container();
        $app = new App($container);
        (require 'config/routes.php')($app, $container);
        return $app;
    }

    private function container(): ContainerInterface
    {
        return require 'config/container.php';
    }
}
