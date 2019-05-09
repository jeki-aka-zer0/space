<?php

declare(strict_types=1);

namespace Api\Model\Job\Entity\Job;

use Api\Infrastructure\Model\Id\Id;
use Api\Infrastructure\Model\Sort\Sort;
use Api\Infrastructure\Model\Status\Status;
use Api\Infrastructure\Model\Status\StatusTrait;
use Api\Model\AggregateRoot;
use Api\Model\EventTrait;
use Api\Model\Language\Entity\Language\Language;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="job_jobs",
 *     indexes={
 *        @ORM\Index(name="job_jobs_sort_idx", columns={"sort"}),
 *     }
 * )
 */
final class Job implements AggregateRoot
{
    use EventTrait, StatusTrait;

    /**
     * @var Id
     * @ORM\Column(type="id")
     * @ORM\Id
     */
    private $id;

    /**
     * @var Language
     * @ORM\ManyToOne(targetEntity="Api\Model\Language\Entity\Language\Language")
     * @ORM\JoinColumn(name="language_code", referencedColumnName="code", nullable=false, onDelete="CASCADE")
     */
    private $language;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $experience;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @var Status
     * @ORM\Column(type="status")
     */
    private $status;

    /**
     * @var Sort
     * @ORM\Column(type="sort", unique=true)
     */
    private $sort;

    public function __construct(Id $id, Language $language, string $name, string $experience, string $content, Sort $sort)
    {
        $this->id = $id;
        $this->language = $language;
        $this->name = $name;
        $this->experience = $experience;
        $this->content = $content;
        $this->sort = $sort;
        $this->status = Status::DRAFT;
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * @return Language
     */
    public function getLanguage(): Language
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getExperience(): string
    {
        return $this->experience;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return Sort
     */
    public function getSort(): Sort
    {
        return $this->sort;
    }
}
