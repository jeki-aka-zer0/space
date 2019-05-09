<?php

declare(strict_types=1);

namespace Api\Model\Job\Service\Job\Parser\HeadHunter;

use Exception;
use PHPHtmlParser\Dom;
use RuntimeException;

final class Job
{
    private const CONTENT_SELECTOR = '.vacancy-description';
    private const EXPERIENCE_SELECTOR = '.bloko-gap';
    private $page;
    private $content;

    public function __construct(string $url)
    {
        $this->page = new Dom;
        $this->page->loadFromUrl($url);
    }

    public function getJob(): JobDTO
    {
        $dto = new JobDTO;
        $dto->name = $this->getName();
        $dto->experience = $this->getExperience();
        $dto->description = $this->getDescription();
        return $dto;
    }

    private function getExperience(): string
    {
        try {
            return (string)$this->getContent()->find(self::EXPERIENCE_SELECTOR)->find('p')->find('span[data-qa="vacancy-experience"]')->text;
        } catch (Exception $e) {
            return '';
        }
    }

    private function getDescription(): string
    {
        try {
            return (string)$this->getContent()->find('.g-user-content')->innerHtml();
        } catch (Exception $e) {
            throw new RuntimeException('Can not find job description.');
        }
    }

    private function getName(): string
    {
        try {
            return (string)$this->page->find('h1')->text;
        } catch (Exception $e) {
            throw new RuntimeException('Can not find job name.');
        }
    }

    /**
     * @return Dom\HtmlNode|Dom\Collection
     */
    private function getContent()
    {
        if (null === $this->content) {
            if (!$this->content = $this->page->find(self::CONTENT_SELECTOR)) {
                throw new RuntimeException('Can not find job content.');
            }
        }

        return $this->content;
    }
}
