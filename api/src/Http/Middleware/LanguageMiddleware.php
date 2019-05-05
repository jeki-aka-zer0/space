<?php

declare(strict_types=1);

namespace Api\Http\Middleware;

use Api\Infrastructure\Framework\Settings\Settings;
use Api\Model\Language\Entity\Language\Language;
use Api\ReadModel\Language\LanguageReadRepository;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class LanguageMiddleware implements MiddlewareInterface
{
    const HEADER_NAME = 'Accept-Language';
    private $languages;
    private $settings;
    private $fromHeader;

    public function __construct(LanguageReadRepository $languages, Settings $settings)
    {
        $this->languages = $languages;
        $this->settings = $settings;
    }

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     * @throws Exception
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $this->setFromHeader($request);
        $allowed = $this->languages->allActive();

        array_map([$this, 'rememberIfMatches'], $allowed);

        return $handler->handle($request);
    }

    private function setFromHeader(ServerRequestInterface $request): void
    {
        $contentType = $request->getHeaderLine(self::HEADER_NAME);
        $parts = explode(';', $contentType);
        $this->fromHeader = trim(array_shift($parts));
    }

    /**
     * @param Language $language
     * @throws Exception
     */
    private function rememberIfMatches(Language $language): void
    {
        $code = $language->getCode();

        if (false !== stripos($this->getFromHeader(), $code->getCode())) {
            $this->settings->setLanguage($code);
        }
    }

    /**
     * @return string
     * @throws Exception
     */
    private function getFromHeader(): string
    {
        if (null === $this->fromHeader) {
            throw new Exception('Language from header must be set first.');
        }

        return $this->fromHeader;
    }
}
